<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    //
    public function index(){

        return view('admin.roles.index', ['roles'=>Role::all()]); // we add the roles argument so we can use it in the index
    }
    public function store(){
        Request()->validate([
            'name'=>['required','unique:roles,name']
        ]);
        Role::create([
            'name'=>Str::ucfirst(request('name')),//we set the first letter to uppercase
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')//we set the slug to all lowercase separated by '-'
        ]);
        return back();
    }
    public function edit(Role $role){
        return view('admin.roles.edit',[
            'role'=>$role,
            'permissions'=>Permission::all()]);
    }
    public function update(Role $role){


        $role->name=(Str::ucfirst(request('name')));
        $role->slug=(Str::of(Str::lower(request('name')))->slug('-'));
        if($role->isClean('name')){
            session()->flash('role-updated', 'No changes were made');
        } else {
            session()->flash('role-updated', 'Role updated '.request('name'));
        }
        $role->save();

        return back();
    }
    public function destroy(Role $role){

        $role->delete();
        session()->flash('role-deleted', 'Role "'.$role->name.'" was deleted');

        return redirect()->route('roles.index', ['roles'=>Role::all()]);
    }
    public function attachPermission(Role $role){
        $role->permissions()->attach(request('permission'));
        return back();

    }
    public function detachPermission(Role $role){
        $role->permissions()->detach(request('permission'));
        return back();

    }
}
