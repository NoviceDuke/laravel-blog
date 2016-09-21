@inject('articlePresenter', 'App\Presenters\ArticlePresenter')
@extends('blog.layouts.app')
@section('content')
<div class="row">
    <!--Static Cut Left Panel 75%-->
    <div class="col s12 m9">
        <div class="container" style="width:90%">
        @foreach($articles as $article)
            <section class="article">
                <div class="card">
                    @if(!empty($article->pic_url))
                        <div class="card-image waves-effect waves-block category-img-fix">
                          <img src="{{$article->pic_url}}">
                        </div>
                    @endif
                    <div class="tags-container">
                        @foreach($article->tags()->get() as $tag)
                            <a href="{{url($tag->path())}}"><span class="tag tag-element">{{$tag->name}}</span></a>
                        @endforeach
                        @if($article->category)
                            <a href="{{url($article->category->path())}}"><span class="category new badge bcolor-{{$article->category->css_class}}" data-badge-caption="">{{$article->category->name}}</span></a>
                        @endif
                    </div>
                    <div class="article-content-container">
                        <span class="article-title grey-text text-darken-3">{{$article->title}}</span>
                        <section class="category-content grey-text text-darken-2">{{$article->content}}</section>
                        <div class="article-footer">
                            <span class="article-more"><a href="{{url($article->path())}}">More</a></span>
                            <span class="article-date grey-text right">{{$articlePresenter->getCreatedDate($article)}}</span>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
        </div>
        @include('blog.partials.paginate', ['paginator' => $articles])
    </div>
    <!--Static Cut Left Panel 75%-->
    <!--Static Cut Right Panel 25%-->
    <div class="col s12 m3">
        @include('blog.partials.rightSide')
    </div>
    <!--Static Cut Right Panel 25%-->
</div>
@endsection
