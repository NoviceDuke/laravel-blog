<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    /*
    *
    *
    */
    public function index()
    {
        return 'this is post index';
    }

    public function show($slug)
    {
        $post = Post::all()->where('slug', $slug)->first();

        return view('blog.post.show', compact('post'));
    }
}
