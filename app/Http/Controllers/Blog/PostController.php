<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    /**
     *   Post index view
     *   not any route to here now.
     */
    public function index()
    {
        return 'this is post index';
    }

    /**
     *   show the post.
     *
     *   @param string
     */
    public function show($slug)
    {
        $post = Post::all()->where('slug', $slug)->first();
        if (!$post) {
            return abort(403, 'Slug位置錯誤');
        }

        return view('blog.post.show', compact('post'));
    }

    /**
     *   show the post create view.
     */
    public function create()
    {
        return view('blog.post.create');
    }
}
