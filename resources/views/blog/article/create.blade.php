@extends('blog.layouts.app')
@section('title', '- 建立文章')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="card-panel white">
        <div class="card-panel-container">
        <div class="row">
        {!! Form::open(['url' => url('/article'), 'method' => 'POST', 'class' => 'awesome', 'id'=> 'article_create_form']) !!}
            <h4>Create Article</h4>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::text('title', old('title'), ['id' => 'title','class'=>'validate']) !!}
                    {!! Form::label('title', 'Title') !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <category-selector :categories="{{$categories}}" :styles="{{$styles}}"></category-selector>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <tag-selector :tags="{{$tags}}"></tag-selector>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::text('pic_url', old('pic_url'), ['id' => 'pic_url','class'=>'validate']) !!}
                    {!! Form::label('pic_url', 'Picture URL') !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::label('date', 'Date') !!}
                    {!! Form::date('date', \Carbon\Carbon::now()->format('d F, Y'), ['class' => 'datepicker']) !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::textarea('content', old('content'), ['id' => 'content']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
        </div>
    </div>

@stop
@section('javascript')
@include('partials.tinymce-script')
@endsection
