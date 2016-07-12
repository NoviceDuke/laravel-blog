<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;

class HchsController extends Controller
{
	public function __construct()
	{
	
	}
    //
    public function index(){

        $posts = Post::all();
        // return var_dump($posts);
    	return view('hchs.index',compact('posts'));

    }
}
