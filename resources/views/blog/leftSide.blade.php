<div class="row">
    <div class="container" style="width:90%">
    <div class="col s12 m6">
        @foreach($oddArticles as  $article)
            <section class="article">
                <div class="card  hoverable">
                    @if(!empty($article->pic_url))
        			    <div class="card-image waves-effect waves-block waves-light category-img-fix">
        			      <img class="activator" src="{{$article->pic_url}}">
        			    </div>
                    @endif
                    <div class="tags-container">
                        @foreach($article->tags()->get() as $tag)
                            <a href="#"><span class="tag tag-element">{{$tag->name}}</span></a>
                        @endforeach
                        @if($article->category)
                            <a href="#"><span class="category new badge bcolor-{{$article->category->css_class}}" data-badge-caption="">{{$article->category->name}}</span></a>
                        @endif
                    </div>
    			    <div class="card-content">
    			      <span class="card-title grey-text text-darken-4">{{$article->title}}</span>
    			      <p><a href="{{url($article->path())}}">more</a></p>
    			    </div>
    			    <div class="card-reveal">
    			      <span class="card-title grey-text text-darken-4">{{$article->title}}<i class="material-icons right">close</i></span>
    			      <p>{{$article->content}}</p>
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
        			    <div class="card-image waves-effect waves-block waves-light category-img-fix">
        			      <img class="activator" src="{{$article->pic_url}}">
        			    </div>
                    @endif
                    <div class="tags-container">
                        @foreach($article->tags()->get() as $tag)
                            <a href="#"><span class="tag tag-element">{{$tag->name}}</span></a>
                        @endforeach
                        @if($article->category)
                            <a href="#"><span class="category new badge bcolor-{{$article->category->css_class}}" data-badge-caption="">{{$article->category->name}}</span></a>
                        @endif
                    </div>
    			    <div class="card-content">
    			      <span class="card-title grey-text text-darken-4">{{$article->title}}</span>
    			      <p><a href="{{url($article->path())}}">more</a></p>
    			    </div>
    			    <div class="card-reveal">
    			      <span class="card-title grey-text text-darken-4">{{$article->title}}<i class="material-icons right">close</i></span>
    			      <p>{{$article->content}}</p>
    			    </div>
    			</div>
            </section>
        @endforeach
    </div>
    </div>
</div>
