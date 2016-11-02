@inject('articlePresenter', 'App\Presenters\ArticlePresenter')
<div class="row">
    <div class="container" style="width:90%">
    <div class="col s12 m6">
        @foreach($oddArticles as  $article)
            <section class="article">
                <div class="card  hoverable">
                    @if(!empty($article->pic_url))
        			    <div class="card-image waves-effect waves-block waves-light card-img-fix">
        			      <img class="activator" src="{{$article->pic_url}}">
        			    </div>
                    @endif
                    <div class="tags-container">
                        <div class="row">
                            <div class="col m8">
                            @foreach($article->tags()->get() as $tag)
                                <a href="{{url($tag->path())}}"><span class="tag tag-element">{{$tag->name}}</span></a>
                            @endforeach
                            </div>
                            <div class="col m2">
                            @if($article->category)
                                <a href="{{url($article->category->path())}}"><span class="category new badge bcolor-{{$article->category->style->css}}" data-badge-caption="">{{$article->category->name}}</span></a>
                            @endif
                            </div>
                        </div>
                    </div>
    			    <div class="article-content-container">
                        <span class="article-title grey-text text-darken-3">{{$article->title}}</span>
                        <section class="article-content grey-text text-darken-2">{!!$article->content!!}</section>
                        <div class="article-footer">
                            <span class="article-more"><a href="{{url($article->path())}}">More</a></span>
                            <span class="article-date grey-text right">{{$articlePresenter->getCreatedDate($article)}}</span>
                        </div>
    			    </div>
    			    <div class="card-reveal reveal-container">
    			      <span class="card-title article-title grey-text text-darken-4">{{$article->title}}<i class="material-icons right">close</i></span>
    			      <div class="reveal-content">{!!$article->content!!}</div>
                      <a href="{{url($article->path())}}" class="reveal-btn waves-effect waves-light btn">Read More</a>
    			    </div>
    			</div>
            </section>
        @endforeach
    </div>
    <div class="col s12 m6">
        @foreach($evenArticles as  $article)
            <section class="article">
                <div class="card  hoverable">
                    @if(!empty($article->pic_url))
        			    <div class="card-image waves-effect waves-block waves-light card-img-fix">
        			      <img class="activator" src="{{$article->pic_url}}">
        			    </div>
                    @endif
                    <div class="tags-container">
                        <div class="row">
                            <div class="col m8">
                            @foreach($article->tags()->get() as $tag)
                                <a href="{{url($tag->path())}}"><span class="tag tag-element">{{$tag->name}}</span></a>
                            @endforeach
                            </div>
                            <div class="col m2">
                            @if($article->category)
                                <a href="{{url($article->category->path())}}"><span class="category new badge bcolor-{{$article->category->style->css}}" data-badge-caption="">{{$article->category->name}}</span></a>
                            @endif
                            </div>
                        </div>
                    </div>
    			    <div class="article-content-container">
                        <span class="article-title grey-text text-darken-3">{{$article->title}}</span>
                        <section class="article-content grey-text text-darken-2">{!!$article->content!!}</section>
                        <div class="article-footer">
                            <span class="article-more"><a href="{{url($article->path())}}">More</a></span>
                            <span class="article-date grey-text right">{{$articlePresenter->getCreatedDate($article)}}</span>
                        </div>
    			    </div>
    			    <div class="card-reveal reveal-container">
    			      <span class="card-title article-title grey-text text-darken-4">{{$article->title}}<i class="material-icons right">close</i></span>
    			      <div class="reveal-content">{!!$article->content!!}</div>
                      <a href="{{url($article->path())}}" class="reveal-btn waves-effect waves-light btn">Read More</a>
    			    </div>
    			</div>
            </section>
        @endforeach
    </div>
    </div>
</div>
