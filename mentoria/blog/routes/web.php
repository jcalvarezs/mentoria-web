<?php


use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
//use Illuminate\Support\Facades\File;
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


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{post}', [PostController::class, 'show']);

Route::get('/category/{category:slug}', function (Category $category) {
    return view ('categories', [
        'posts' => $category->posts->load(['category', 'author']),
        'categories' => Category::all(),
        'currentCategory' =>$category,
    ]);
});



Route::get('/author/{author}', function (User $author) {
    return view ('posts', [
        'posts' => $author->posts->load(['category', 'author']),
        'categories' => Category::all(),
    ]);
});