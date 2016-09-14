@extends('blog.layouts.app')
@section('content')
    <div class="card-panel white">
        <div class="card-panel-container">
        <div class="row">
        {!! Form::open(['url' => url($article->path()), 'method' => 'PATCH', 'class' => 'awesome', 'id'=> 'article_edit_form']) !!}
            <h4>Edit Article</h4>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::text('title', $article->title, ['id' => 'title','class'=>'validate']) !!}
                    {!! Form::label('title', 'Title') !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::select('category_id', $categories, $article->category->id) !!}
                    {!! Form::label('category_id', 'Category') !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::text('pic_url', $article->pic_url, ['id' => 'pic_url','class'=>'validate']) !!}
                    {!! Form::label('pic_url', 'Picture URL') !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::label('date', 'Date') !!}
                    {!! Form::date('date',$article->created_at->format('d F, Y'), ['class' => 'datepicker']) !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::textarea('content', $article->content, ['id' => 'content']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
        </div>
    </div>
    @include('partials.tinymce-script')
@stop
