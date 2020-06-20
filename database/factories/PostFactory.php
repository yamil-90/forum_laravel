<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
    	'user_id'=>factory('App\User'), //relate this user id with the model user, this is dynamic data
    	'title'=>$faker->sentence,
    	'post_image'=>$faker->imageUrl('900','300'),
    	'body'=>$faker->paragraph,
        //
    ];
});
