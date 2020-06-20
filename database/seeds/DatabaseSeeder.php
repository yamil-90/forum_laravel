<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory('App\User', 50)->create()->each(function($user){
        	$user->posts()->save(factory('App\Post')->make());

        });
        //--------------------- this will create an amount of users an also access the user/post relationship to create an associated post for each user using the post factory---------------//
    }
}
