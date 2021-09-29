<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {  
 //   \Illuminate\Support\Facades\DB::listen(function($query){
 //       logger($query->sql,  $query->bindings);
 //   });
   

    return view('posts', [
        'posts' => Post::latest('published_at')
                       ->with(['category','author'])
                       ->get()
    ]);
});

Route::get('/post/{post}', function (Post $post) {
    return view ('post', [
        'post' => $post,
    ]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    return view ('posts', [
        'posts' => $category->posts->load(['category', 'author']),
    ]);
});

Route::get('/author/{author:slug}', function (user $author) {
    return view ('posts', [
        'posts' => $author->posts->load(['category', 'author']),
    ]);
});