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

        $user=User::factory(10)->create();


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
            'resumen' => 'The are many',
            'body' => 'Teha are many viartions'
        ]) ;  


         }



    
}
