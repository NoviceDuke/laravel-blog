<?php

namespace App\Http\Controllers\Blog;

use App\Articles\ArticleRepository;
use App\Articles\Tag;
use App\Articles\Category;
use App\Http\Controllers\Controller;

class BlogHomeController extends Controller
{
    /**
     * @var ArticleRepository
     */
    protected $articles;
    public function __construct(ArticleRepository $articles)
    {
        $this->articles = $articles;
        $categories = Category::all();
        view()->share(compact('categories'));
    }

    public function index()
    {
        $oddArticles = $this->articles->getOddArticles()->take(5)->get();
        $evenArticles = $this->articles->getEvenArticles()->take(5)->get();
        $phpArticles = Category::where('name', 'PHP')->first()->articles()->get();

        return view('blog.index', compact('oddArticles', 'evenArticles', 'phpArticles'));
    }

    public function getTrace()
    {
        $tag = Tag::find(1);
        dd($tag->frequency);

        return view('blog.trace', compact('articles'));
    }
}
