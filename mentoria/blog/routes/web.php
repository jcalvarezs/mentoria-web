<?php

use App\Models\Post;
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
    // $posts = cache()->rememberForever('posts.all', fn() =>Post::all());
    $posts = Post::all(); 
    return view('posts',[
        'posts' => $posts
    ]);
});

Route::get('/post/{post}', function ($slug) {
    return view('post', [
        'post'=> post::find($slug),
    ]);
});


  /* foreach ($files as $file ){

        $document= YamlFrontMatter::parseFile($file);
        $posts[] = new Post(
            $document->title,
            $document->resumen,
            $document->date,
            $document->body()
        );
    }*/

   /* $posts = array_map(function($file){
        $document= YamlFrontMatter::parseFile($file);
    return new Post(
        $document->title,
        $document->resumen,
        $document->date,
        $document->body()
    );
   
    },$files);*/
//Route::get('/', fn () => view('welcome'));

//Route::get('/', fn () => 'Hola Segic');
//Route::get('/', fn () => ['ID' => 7, 'url' => 'http://www.segic.cl']);
