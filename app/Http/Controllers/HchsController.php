<?php

namespace App\Http\Controllers;

use App\Post;

class HchsController extends Controller
{
    public function __construct()
    {
    }
    //
    public function index()
    {
        $posts = Post::all();
        // return var_dump($posts);
        return view('hchs.index', compact('posts'));
    }
    public function trace()
    {
        $posts = Post::all();
            // return var_dump($posts);
        return view('hchs.trace', compact('posts'));
    }
}
