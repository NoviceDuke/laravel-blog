@inject('articlePresenter', 'App\Presenters\ArticlePresenter')
@extends('blog.layouts.app')
@section('title', '- 文章類別')
@section('content')
<div class="row">
    <!--Static Cut Left Panel 75%-->
    <div class="col s12 m9">
        <ul class="collapsible popout" data-collapsible="accordion">
            @foreach ($categories as $category)
                <li>
                  <div class="collapsible-header border-left-{{$category->style->css}}"><i class="material-icons">loyalty</i>{{$category->name}}
                      <span class="tag">{{count($category->articles)}}</span>
                  </div>
                  <div class="collapsible-body">
                    <section class="collapible-section">
                        <div class="collection">
                            @foreach ($category->articles as $article)
                                <a href="{{$article->path()}}" class="collection-item">{{$article->title}}
                                    <span class="new badge" data-badge-caption="">{{$articlePresenter->getCreatedDate($article)}}</span>
                                </a>
                            @endforeach
                        </div>
                    </section>
                  </div>
                </li>
            @endforeach
        </ul>
    </div>
    <!--Static Cut Left Panel 75%-->
    <!--Static Cut Right Panel 25%-->
    <div class="col s12 m3">
        @include('blog.partials.rightSide')
    </div>
    <!--Static Cut Right Panel 25%-->
</div>
@endsection
