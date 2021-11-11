<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return Post::latest('published_at')
        ->filter(request(['search']))
        ->paginate();

       // return view('posts', [
            //'posts' => Post::latest('published_at')->with(['category', 'author'])->filter()->get(),
       //     'posts' => Post::latest('published_at')
      //                  ->filter(request(['search']))
     //                   ->get(),
     //       'categories' => Category::all(),
     //   ]);

    }

    Public function show(Post $post) {    
        return view('post', [
         'post' => $post, 
        ]);
    }
}