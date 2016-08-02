<?php

namespace App\Http\Controllers\Blog;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;

class BlogHomeController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        view()->share(compact('categories'));
        $this->middleware('auth');
    }

    public function index()
    {
        $newPosts = Post::query()->orderBy('created_at', 'DESC')->take(4)->get();
        $lyricPosts = Category::where('name', 'Lyrics')->first()->posts()->get();

        return view('blog.index', compact('newPosts', 'lyricPosts'));
    }

    public function trace()
    {
        $posts = Post::all();

        return view('blog.trace', compact('posts'));
    }
}
