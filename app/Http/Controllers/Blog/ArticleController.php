<?php

namespace App\Http\Controllers\Blog;

use Event;
use App\Article;
use App\Category;
use App\Events\ArticleEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        view()->share(compact('categories'));
    }
    /**
     *   Article index view
     *   not any route to here now.
     */
    public function index()
    {
        return 'this is article index';
    }

    /**
     *   show the article.
     *
     *   @param string
     */
    public function show($slug)
    {
        $article = Article::all()->where('slug', $slug)->first();
        if (!$article) {
            return abort(403, 'Slug位置錯誤');
        }

        return view('blog.article.show', compact('article'));
    }

    /**
     *   show the article create view.
     */
    public function create()
    {
        //grab all of our categories in database;
        $categories = Category::lists('name', 'id');

        return view('blog.article.create')->withCategories($categories);
    }

    /**
     *   store a new article .
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'content' => 'required',
        ]);

        $article = new Article($request->all());
        $article->slug = $request->title.'-'.Auth::id();

        Auth::user()->addArticle($article);

        // 觸發事件 -> 文章被新增
        Event::fire(new ArticleEvents($article, 'posted'));

        return redirect('/article/'.$article->slug);
    }
}
