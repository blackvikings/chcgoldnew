<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class PermissionController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');    
        $this->middleware('permission:permissions');
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-update', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $permissions = Permission::all();
    	return view('admin.permissions.index', ['permissions' => $permissions]);
    }

    public function createview()
    {
    	return view('admin.permissions.create');
    }

    public function create(Request $req)
    {
        $validation = Validator::make($req->all(), [ 
            'name' => 'required|max:20|unique:permissions|string',
        ]);

        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return Redirect::back()->withInput();
       }

        Permission::create(['name' => $req->name, 'description' => $req->description]);
        return Redirect::back()->with(['msg', 'The Message']);
    }

    public function updateview($permission_id)
    {
        $permission = Permission::where('id', $permission_id)->first();
    	return view('admin.permissions.update', ['permission' => $permission]);
    }

    public function update(Request $req, $permission)
    {
        $validation = Validator::make($req->all(), [ 
            'name' => 'required|max:20|unique:permissions|string',
        ]);

        if ($validation->fails()) 
        {
            Session::flash('error', $validation->messages()->first());
            return Redirect::back()->withInput();
        }

        $permission = Permission::find($permission);
        $permission->name = $req->name; 
        $permission->description = $req->description;
        $permission->save();
        return Redirect::back()->with(['msg', 'The Message']);
    }

    public function destroy($permission_id)
    {
        $roles = Role::with('permissions')->get();
        $permission = Permission::where('id', $permission_id)->first();

        $i = 0;
        foreach ($roles as $role) {
            if (isset($role->permissions[$i])) {
                $role->revokePermissionTo($permission);
                $permission->removeRole($role);
            }
            $i++;
        }
        Permission::where('id', $permission_id)->delete();

        return Redirect::back()->with(['msg', 'The Message']);
    }
}
