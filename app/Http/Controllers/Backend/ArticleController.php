<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Event;
use App\Articles\ArticleRepository;
use App\Articles\Category;
use App\Articles\Article;
use App\Events\ArticleEvents;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ArticleRepository $articles)
    {
        $this->articles = $articles;
        $categories = Category::all();
        view()->share(compact('categories'));
    }
    public function index()
    {
        $articles = Article::orderBy('id','desc')->paginate(10);
        return view('backend.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the article in the database
        $articles = Article::find($id);
        return view('backend.article.show',compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the article in the database and save
        $articles = Article::find($id);
        //return the view and pass in we previously created
        return view('backend.article.edit',compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the data
        $this->validate($request,array('title'=>'required','content'=>'required'));
        //find the article id
        $articles = Article::find($id);
        //match input
        $articles->title = $request->input('title');
        $articles->content = $request->input('content');
        //save it
        $articles->save();
        //flash message
        //Session:flash('flash_message','Article is saved');
        //back to showpage
        return redirect()->route('backend.article.show',$articles->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $articles = Article::find($id);
        $articles->delete();
        return redirect()->route('backend.article.index');
    }
}
