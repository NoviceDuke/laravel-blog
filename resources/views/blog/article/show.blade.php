@extends('blog.layouts.app')
@section('title', '- 文章')
@section('content')
@inject('articlePresenter', 'App\Presenters\ArticlePresenter')
<div class="container show-container">
<div class="row">
    <div class="card">
        <div class="card-image card-image-fix">
            <img src="{{$article->pic_url}}">
        </div>
        <div class="card-content">
            <div class="row">
                <span class="card-show-category">
                    @if($article->category)
                        <a href="{{url($article->category->path())}}"><span class="category fix new badge bcolor-{{$article->category->style->css}}" data-badge-caption="">{{$article->category->name}}</span></a>
                    @endif
                    <span class="right show-date"> {{$articlePresenter->getCreatedAt($article)}} </span>
                </span>
            </div>
            <div class="row">
                <span class="card-show-title">{{$article->title}}</span>
            </div>
            <div class="card-content-fix">
                <p>{!!$article->content!!}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
