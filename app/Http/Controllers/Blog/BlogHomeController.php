<?php

namespace App\Http\Controllers\Blog;

use App\Articles\ArticleRepository;
use App\Articles\Tag;
use App\Articles\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\SendEmail;

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

        return view('blog.home.index', compact('oddArticles', 'evenArticles'));
    }

    public function filter(Request $request)
    {
        $articles = $this->articles->search($request->get('search'))->paginate(8);
        return view('blog.home.filter', compact('articles'));
    }

    public function getTrace()
    {
        $this->dispatch(new SendEmail);

        return 'trace';
    }
}
