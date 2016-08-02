<!-- New Posts -->
<div class="col s12 m12">
	<div class="category-container">
		<h3 class="category-container-title border-top-brown">New Post</h3>
		<div class="row">
			<div class="col s12 m6">
				<div class="card category-card-fix" style="margin-right:0px;">
				    <div class="card-image waves-effect waves-block waves-light category-img-fix">
				      <img class="activator" src="http://images.freeimages.com/images/previews/4a7/around-home-3-1470151.jpg">
				    </div>
				    <div class="card-content">
				      <span class="card-title grey-text text-darken-4">{{$newPosts[0]->title}}</span>
				      <p><a href="{{url($newPosts[0]->path())}}">more</a></p>
				    </div>
				    <div class="card-reveal">
				      <span class="card-title grey-text text-darken-4">{{$newPosts[0]->title}}<i class="material-icons right">close</i></span>
				      <p>{{$newPosts[0]->content}}</p>
				    </div>
				</div>
			</div>
			<div class="col s12 m6">
				<div class="card category-card-fix" style="margin-left:0px;">
					<div class="card-image waves-effect waves-block waves-light category-img-fix">
					  <img class="activator" src="http://images.freeimages.com/images/previews/4a7/around-home-3-1470151.jpg">
					</div>
					<div class="card-content">
					  <span class="card-title grey-text text-darken-4">{{$newPosts[1]->title}}</span>
					  <p><a href="#">more</a></p>
					</div>
					<div class="card-reveal">
					  <span class="card-title grey-text text-darken-4">{{$newPosts[1]->title}}<i class="material-icons right">close</i></span>
					  <p>{{$newPosts[1]->content}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- New Posts -->
<!-- Lyrics -->
<div class="col s12 m6">
	<div class="category-container">
		<h3 class="category-container-title border-top-red">{{$categories[0]->name}}</h3>
		<div class="card category-card-fix">
			<div class="card-image waves-effect waves-block waves-light category-img-fix">
			  <img class="activator" src="http://images.freeimages.com/images/previews/4a7/around-home-3-1470151.jpg">
			</div>
			<div class="card-content">
			  <span class="card-title grey-text text-darken-4">{{$lyricPosts[0]->title}}</span>
			  <p><a href="#">more</a></p>
			</div>
			<div class="card-reveal">
			  <span class="card-title grey-text text-darken-4">{{$lyricPosts[0]->title}}<i class="material-icons right">close</i></span>
			  <p>{{$lyricPosts[0]->content}}</p>
			</div>
		</div>
	</div>
</div>
<!-- Lyrics -->
<!-- Server -->
<div class="col s12 m6">
	<div class="category-container">
		<h3 class="category-container-title border-top-blue">{{$categories[1]->name}}</h3>

			<div class="card category-card-fix">
				<div class="card-image waves-effect waves-block waves-light category-img-fix">
				  <img class="activator" src="http://images.freeimages.com/images/previews/4a7/around-home-3-1470151.jpg">
				</div>
				<div class="card-content">
				  <span class="card-title grey-text text-darken-4">{{$newPosts[1]->title}}</span>
				  <p><a href="#">more</a></p>
				</div>
				<div class="card-reveal">
				  <span class="card-title grey-text text-darken-4">{{$newPosts[1]->title}}<i class="material-icons right">close</i></span>
				  <p>{{$newPosts[1]->content}}</p>
				</div>
			</div>

	</div>
</div>
<!-- Server -->
