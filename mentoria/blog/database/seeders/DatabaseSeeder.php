<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        // \App\Models\User::factory(10)->create();
        user::truncate();
        Category::truncate();

       // $user=User::factory(10)->create();


        $personal = Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
         ]);     

        $work = Category::create([
            'name'=>'Work',
            'slug'=>'work'
        ]);
        $hobbies = Category::create([
            'name'=>'Hobbies',
            'slug'=>'hobbies'  
        ]);   
        
         post::create([
            'category_id' => $work->id,
            'user_id' => $user->id,
            'slug' => 'my-firt-post',
            'title' => 'My First Post',
            'resumen' => 'El pasaje estándar Lorem Ipsum, usado desde el año 1500.',
            'body' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
        ]) ;  

     }
    
}
