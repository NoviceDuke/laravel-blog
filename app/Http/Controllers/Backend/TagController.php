<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Articles\Tag;
use App\Articles\Category;
use App\Articles\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
        return view('backend.tag.index',compact('tags'));
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

        $tag = new Tag();
        $tag->name = $request->get('name');
      //  $tag->slug = str_slug($tag->name,'-');

        $tag->save();

        if($request->ajax())
        {
          return response()->json($tag);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        //
          $tag = Tag::find($id);
          if($request->ajax())
          {

          return response()->json($tag);
          }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $tag = Tag::find($id);
        $tag -> update($request->all());
        if($request->ajax())
        {

        return response()->json($tag);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //
        $tag = Tag::find($id);
        $tag -> delete();
        if($request->ajax())
        {
          return response()->json($tag);
        }
    }
}
