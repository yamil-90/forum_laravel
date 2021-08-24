<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index(){
        return view('admin.permissions.index', ['permissions'=>Permission::all()]);
    }
    public function destroy(Permission $permission){
        $permission->delete();
        return redirect()->route('permissions.index', ['permissions'=>Permission::all()]);
    }
    public function edit(Permission $permission){
        return view('admin.permissions.edit', ['permission'=>$permission]);
    }
    public function store(){
        Request()->validate([
            'name'=>['required','unique:permissions,name']
        ]);
        Permission::create([
            'name'=>Str::ucfirst(request('name')),//we set the first letter to uppercase
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')//we set the slug to all lowercase separated by '-'
        ]);
        return back();
    }
    public function update(Permission $permission){


        $permission->name=(Str::ucfirst(request('name')));
        $permission->slug=(Str::of(Str::lower(request('name')))->slug('-'));
        if($permission->isClean('name')){
            session()->flash('permission-updated', 'No changes were made');
        } else {
            session()->flash('permission-updated', 'permission updated '.request('name'));
        }
        $permission->save();

        return back();
    }
}
