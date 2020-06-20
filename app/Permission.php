<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $guarded = [];
    public function roles(){
        return $this->belongsToMany(Role::class);//if we are not following conventions (not alphabetical and with 's' we need to add the name as a second parameter)

    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
