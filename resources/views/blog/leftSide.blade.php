<div class="row">
    <div class="container" style="width:90%">
    <div class="col s12 m6">
        @foreach($oddArticles as  $article)
            <section class="article">
                <div class="card" style="margin-right:0px;">
    			    <div class="card-image waves-effect waves-block waves-light category-img-fix">
    			      <img class="activator" src="{{$article->pic_url}}">
    			    </div>
                    <div class="tags-container">
                        @foreach($article->tags()->get() as $tag)
                            <span>{{$tag->name}}</span>
                        @endforeach
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
                <div class="card" style="margin-right:0px;">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="{{$article->pic_url}}">
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
