<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
//        'posts' => Post::all() //this uses many sql queries
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(10)->withQueryString() //the with query includes the existing query string
            //to change styl we need to use `php artisan vendor:publish` -> laravel-pagination then change the views accordingly
//            )->simplePaginate this uses only Next/Previous buttons and is associated with /views/vendor/pagination/simple-viewname.blade.php
        ]);
    }

    public function show(Post $post)
    {
        // Find a post by its slug and pass it to a view called "post"
        return view('posts.show', [
            'post' => $post, //route model binding
        ]);
    }

}
