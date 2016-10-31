<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Articles\Category;
use App\Articles\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view('backend.category.index',compact('categories'));
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
        $this->validate($request, [
          'name' => 'required|max:255',
        ]);

        $category = new Category();
        $category->name = $request->get('name');
        $category->slug = str_slug($category->name,'-');
        $category->save();

        if($request->ajax())
        {
          return response()->json($category);
        }

        Session::flash('success', 'New Category has been created');
        return redirect()->route('backend.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug,Request $request)
    {
        //

          $category = Category::where('slug',$slug)->first();
          $articles = Category::findSlug($slug)->articles();
       if($request->ajax())
        {
          return response()->json($category);
       }
       return view('backend.category.show',compact('category','articles'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,Request $request)
    {
        //
        $category = Category::where('slug',$slug)->first();
        $category->name = $request->get('name');
        $category->slug = str_slug($category->name,'-');
        $category->save();
        if($request->ajax())
        {
        return response()->json($category);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
        $category = Category::where('slug', $slug)->first();

        $category->update($request->all());
        if($request->ajax())
        {
            return response()->json($category);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,Request $request)
    {
        //
        $category = Category::where('slug',$slug)->first();
      //  $category->delete();
        $category->delete($request->all());
        if($request->ajax())
        {

        return response()->json($category);
        }

        return redirect()->route('backend.category.index');
    }
}
