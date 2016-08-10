<?php

namespace App\Http\Controllers;



class ArticleController extends Controller
{
	public function show()  
	{
	    return view('home')->withArticles(\App\Article::all());
	}
}
