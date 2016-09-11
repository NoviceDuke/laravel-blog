<?php

namespace App\Http\Controllers\Blog;

use Event;
use Auth;
use App\Articles\ArticleRepository;
use App\Articles\Category;
use App\Events\ArticleEvents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Alertable;

class ArticleController extends Controller
{
    use Alertable;
    /**
     * @var ArticleRepository
     */
    protected $articles;

    /**
     *  建構子依賴注入.
     *
     *  @param ArticleRepository:class
     */
    public function __construct(ArticleRepository $articles)
    {
        // 設定中介層，必須登入，除了Show()不必登入
        $this->middleware('auth', ['except' => 'show']);

        $this->articles = $articles;
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
     *   顯示某篇文章 (slug).
     *
     *   @param slug string
     */
    public function show($slug)
    {
        $article = $this->articles->getFromSlug($slug);
        if (!$article) {
            return abort(404, 'Slug Not Found');
        }
        $nextArticle = $this->articles->getNextArticles($article, 1);
        $previousArticle = $this->articles->getPreviousArticles($article, 1);

        return view('blog.article.show', compact('article', 'nextArticle', 'previousArticle'));
    }

    /**
     *  顯示創建文章的頁面.
     */
    public function create()
    {
        // 權限檢查
        if (!(Auth::user()->isSuperRoot() || Auth::user()->hasPermission('CreateArticle'))) {
            $this->alert('Warning', '你沒有建立文章的權限')->warning()->flashIt();

            return redirect()->route('blog.index');
        }

        //grab all of our categories in database;
        $categories = Category::lists('name', 'id');

        //return view('blog.article.create')->withCategories($categories);
        return view('blog.article.create', compact('articles', 'categories'));
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
        // 串slug HardCode
        $articleArray = array_merge($request->all(), ['slug' => str_slug($request->title, '-')]);

        $article = $this->articles->createFromUser($articleArray, Auth::user());

        // 觸發事件 -> 文章被新增
        Event::fire(new ArticleEvents($article, 'posted'));
        $this->alert('Success', 'Your article is created successful')->success()->flashIt();

        return redirect('/article/'.$article->slug);
    }
}
