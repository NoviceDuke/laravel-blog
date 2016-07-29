
@foreach($posts as $key=>$post)
	<div class="col s12 m6">
        <div class="category-container">
            <h3 class="category-container-title border-top-blue">Category Title</h3>
            <div class="row">
            	<div class="col m12">
                    <div class="card medium category-card-fix">
            		    <div class="category-img-fix card-image waves-effect waves-block waves-light">
            		    	<img class="activator" src="{{$post->pic_url}}">
            		    </div>
            		    <div class="card-content">
            		    	<span class="card-title activator grey-text text-darken-4">{{$post->title}}</span>
            		      	<p><a href="{{url($post->path())}}">more</a></p>
            		    </div>
            		    <div class="card-reveal">
            		      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
            		      <p>Here is some more information about this product that is only revealed once clicked on.</p>
            		    </div>
            		</div>
            	</div>
            </div>
        </div>
	</div>
@endforeach
