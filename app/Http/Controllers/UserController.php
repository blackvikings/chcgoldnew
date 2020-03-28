<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;
class UserController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:manage-user');
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */   

    public function index(Request $req)
    {
        // $users = User::orderBy('id','DESC')->with('roles')->get();
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', '!=', 'student');
            }
        )->with('roles')->get();
        $roles = Role::orderBy('id','DESC')->where('name', '!=', 'student')->get();
        return view('admin.users.index',['users' => $users, 'roles' => $roles]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($req->status == null)
        {
            $status = 'Inactive';
        }
        else{
            $status = $req->status;
        }

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'status' => $status
        ]);

        $role = Role::where('name', 'user')->first();
        $user->assignRole($role);

        if (request()->input('_submit') == 'redirect') {
            Session::flash('status', 'User create successfully!!'); 
            return Redirect::route('manage.user');
            }
        else {
            Session::flash('status', 'User create successfully!!'); 
            return Redirect::route('create.user');
        }
    }

    public function edit($id)
    {
    	$user = User::where('id', $id)->first();
    	return view('admin.users.update',compact('user'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($req->status == null)
        {
            $status = 'Inactive';
        }
        else{
            $status = $req->status;
        }

    	$user = User::find($id);
    	$user->name = $req->name;
        $user->password = Hash::make($req->password);
        $user->status = $req->status;
    	$user->save();

    	 if (request()->input('_submit') == 'redirect') {
            Session::flash('status', 'User updated successfully!!'); 
            return Redirect::route('manage.user');
            }
        else {
            Session::flash('status', 'User updated successfully!!'); 
            return Redirect::route('create.user');
        }
    }

    public function roleassign(Request $req)
    {
        // print_r($req->all());die;
        $role = Role::where('id', $req->role_id)->first();
        $user = User::where('id', $req->user_id)->first();
        if (isset($user->role_ids)) {
            $user->syncRoles($role);
            return $hello = 'Role is assigned'; 
        }
        $user->assignRole($role);
        return $hello = 'Role is assigned';
        
    }

    public function destroy($user_id)
    {
        $user = User::where('id', $user_id)->first();
        if (isset($user->role_ids)) 
        {  
            $role = Role::where('id', $user->role_ids[0])->first();    
            $user->removeRole($role);
        }
        User::find($user_id)->delete();        
        return Redirect::back()->with(['msg', 'The Message']);  
    }
}
