<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    //
    public function show(User $user){
        return view('admin.users.profile',
            [
                'user'=>$user,
                'roles'=>Role::all()
            ]);
    }

    public function index(){

        $users = User::all();

        return view('admin.users.index', ['users'=>$users]);

    }
    public function update (User $user){

        $inputs = request()->validate([
            'name'=>['required', 'string', 'max:255', 'alpha_dash'],
            'username'=>['required', 'min:5', 'string', 'max:25', 'alpha_dash'],
            'email'=>['email', 'required', 'max:255'],
            'avatar'=>['file'],
            // 'password'=>['confirmed', 'min:8', 'max:255']
        ]);
        if(request('avatar')){
            $inputs['avatar']=request('avatar')->store('images');
        }
        $user->update($inputs);
        return back();
    }
    public function destroy(User $user){
        $user->delete();
        Session::flash('message', "User Deleted");
        return back();
    }
    public function attach(User $user){
       $user->roles()->attach(request('role'));
       return back();

    }
    public function detach(User $user){
        $user->roles()->detach(request('role'));
        return back();

     }
}

