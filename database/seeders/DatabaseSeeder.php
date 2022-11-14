<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // creates 10 users
         \App\Models\User::factory()->count(10)->create();

        // creates 10 posts
        // \App\Models\Post::factory()->count(10)->create();

    }
}
