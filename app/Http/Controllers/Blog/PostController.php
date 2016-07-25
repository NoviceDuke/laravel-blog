<?php

namespace App\Http\Controllers\Blog;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    /**
     *   store a new post .
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'content' => 'required',
        ]);

        return view('blog.post.create');
    }
}
