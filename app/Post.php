<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $guarded = []; //this will allow us to create post with the data we want
    // to assign without having to add the fillables, but in production it is better to do it the other way
    public function user(){
            return $this->belongsTo(User::class);
        }

    // public function setPostImageAttribute($value){
    //     $this->attributes['post_image']= asset($value);
    // }
    public function getPostImageAttribute($value){
         return asset($value);
    }
    // public function categories(){
    //     return $this->belongsToMany(Category::class);
    // }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
