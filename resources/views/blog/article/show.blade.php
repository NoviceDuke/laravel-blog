@extends('blog/app')
@section('content')
@inject('articlePresenter', 'App\Presenters\ArticlePresenter')
<div class="row">
<div class="col s12">
    <div class="card">
        <div class="card-image">
            <img class="card-image-fix" src="{{$article->pic_url}}">
        </div>
        <div class="card-content">
            <div class="row">
                <span class="card-show-category">
                    @if($article->category)
                    <a href="{{url($article->category->path())}}">{{$article->category->name}}</a>
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
        <div class="card-action">
            <a href="#">This is a link</a>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col s6">
        前一個
    </div>
    <div class="col s6">
        下一個
    </div>
</div>
@include('partials.sweet_alert')
@endsection
