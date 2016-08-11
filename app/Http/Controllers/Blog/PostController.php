<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {
	public function __construct() {
		$categories = Category::all();
		view()->share(compact('categories'));
	}
	/**
	 *   Post index view
	 *   not any route to here now.
	 */
	public function index() {
		return 'this is post index';
	}

	/**
	 *   show the post.
	 *
	 *   @param string
	 */
	public function show($slug) {
		$post = Post::all()->where('slug', $slug)->first();
		if (!$post) {
			return abort(403, 'Slug位置錯誤');
		}

		return view('blog.post.show', compact('post'));
	}

	/**
	 *   show the post create view.
	 */
	public function create() {
		//grab all of our categories in database;
		$categories = Category::lists('name', 'id');

		return view('blog.post.create')->withCategories($categories);
	}

	/**
	 *   store a new post .
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'title' => 'required',
			'date' => 'required',
			'content' => 'required',
		]);
		$post = new Post($request->all());
		$post->slug = $request->title . '-' . Auth::id();

		Auth::user()->addPost($post);

		return redirect('/post/' . $post->slug);
	}
}
