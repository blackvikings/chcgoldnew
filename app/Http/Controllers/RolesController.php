<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect;
use Validator;
use Session;
class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:roles');
        $this->middleware('permission:roles-create', ['only' => ['create','store']]);
        $this->middleware('permission:roles-update', ['only' => ['edit','update']]);
        $this->middleware('permission:roles-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $roles = Role::all();
    	return view('admin.roles.index', ['roles' => $roles]);
    }

    public function createview()
    {
    	return view('admin.roles.create');
    }

    public function create(Request $req)
    {
        $validation = Validator::make($req->all(), [ 
            'name' => 'required|max:20|string',
            'slug' => 'required|string',
        ]);

        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return Redirect::back()->withInput();
       }
        Role::create(['name' =>  $req->name, 'slug' => $req->slug]);
        Session::flash('status', 'Role Created'); 
        return Redirect::route('manage.roles');
    }

    public function updateview($role_id)
    {
        $role = Role::where('id', $role_id)->first();
    	return view('admin.roles.update', ['role' => $role]);
    }

    public function update(Request $req, $role_id)
    {
        $validation = Validator::make($req->all(), [ 
            'name' => 'required|max:20|string',
            'slug' => 'required|string',
        ]);

        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return Redirect::back()->withInput();
        }
        $role = Role::find($role_id);
        $role->name = $req->name;
        $role->slug = $req->slug;
        $role->save();
        Session::flash('status', 'Role updated'); 
        return Redirect::route('manage.roles');
    }

    public function destroy($role_id)
    {
        $role = Role::where('id', $role_id)->first();
        if(isset($role->permission_ids)){
            $permissions = Permission::whereIn('id', $role->permission_ids)->get();
            $role->revokePermissionTo($permission);
            foreach ($permissions as $permission ) 
            {
                $permission->removeRole($role);
            }
        }
        Role::where('id', $role_id)->delete();
        Session::flash('status', 'Role deleted successfully!!'); 
        return Redirect::route('manage.roles');
    }
}
