<?php

namespace App\Http\Controllers\Blog;

use App\Article;
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
        $newArticles = Article::query()->orderBy('created_at', 'DESC')->take(2)->get();
        $lyricArticles = Category::where('name', 'Lyrics')->first()->articles()->get();
        $phpArticles = Category::where('name', 'PHP')->first()->articles()->get();

        return view('blog.index', compact('newArticles', 'lyricArticles', 'phpArticles'));
    }

    public function trace()
    {
        $articles = Article::all();

        return view('blog.trace', compact('articles'));
    }
}
