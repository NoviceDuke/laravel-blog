<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class BlogHomeController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

	    $posts = Post::all();
	    // return var_dump($posts);
		return view('blog.index',compact('posts'));

    }

     public function trace(){

	    $posts = Post::all();
	        // return var_dump($posts);
	    return view('blog.trace',compact('posts'));

    }



}
