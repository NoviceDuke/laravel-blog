<?php

namespace App\Http\Controllers\Blog;

use App\Articles\Category;
use App\Articles\Style;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dispaly a view of all of our categories
        $categories = Category::all();

        return view('blog.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->ajax())
        {
            return 'No Way';
        }
        // dd('123456');
        Category::create([
            'name' => $request->get('name'),
        ])->useStyle(Style::find($request->get('style_id')));
        $category = Category::findName($request->get('name'));
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $articles = Category::findSlug($slug)->articles()->paginate(6);

        return view('blog.category.show', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
