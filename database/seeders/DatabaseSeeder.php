<?php

namespace Database\Seeders;

use App\Post;
use App\User;
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
        User::factory()
            ->count(5)
            ->has(Post::factory()->count(4));
        //--------------------- this will create an amount of users an also access the user/post relationship to create an associated post for each user using the post factory---------------//
    }
}
