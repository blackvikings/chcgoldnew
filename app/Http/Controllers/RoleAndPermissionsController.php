<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect;
use Auth;
use App\User;
class RoleAndPermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:roles-permissions', ['only' => 'index']);
    }

    public function index($slug)
    {
    	$role = Role::where('slug', $slug)->with('permissions')->first();
    	$permissions = Permission::with('roles')->get();
    	return view('admin.assignpermission.index', ['role' => $role, 'permissions' => $permissions]);
    }

    public function unassign(Request $req)
    {
        $role = Role::where('id', $req->role_id)->first();
        $permission = Permission::where('id', $req->permission_id)->get();
        $role->revokePermissionTo($permission);
        // $permission->removeRole($role);

        return $ok = 'hello0';
    }

    public function assign(Request $req)
    {
        // print_r($req->all());die;
        $role = Role::where('id', $req->role_id)->first();
        $permission = Permission::where('id', $req->permission_id)->first();
        $role->givePermissionTo($permission);
        $permission->assignRole($role);
        
        return $ok = 'hello';
    }
}
