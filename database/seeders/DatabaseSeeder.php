<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // example seeder make user and post data 
        User::create([
            'name' => 'Muhammad Khutub Alfaroqi',
            'username' => 'alfaroqi',
            'email' => 'alfaroqi@gmail.com',
            'password' => bcrypt('admin')
        ]);


        User::factory(3)->create();

        Category::create([
           'name' => 'Web Programming', 
           'slug' => 'web-programming'
        ]);


        Category::create([
            'name' => 'Personal', 
            'slug' => 'personal'
         ]);

         Category::create([
            'name' => 'Science', 
            'slug' => 'Science'
         ]);


        Post::factory(20)->create();

    }
}
