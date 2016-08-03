<!-- New Posts -->
<div class="col s12 m12">
	<div class="category-container">
		<h3 class="category-container-title border-top-brown">New Post</h3>
		<div class="row">
			<div class="col s12 m6">
				<div class="card category-card-fix" style="margin-right:0px;">
				    <div class="card-image waves-effect waves-block waves-light category-img-fix">
				      <img class="activator" src="{{$newPosts[0]->pic_url}}">
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
					  <img class="activator" src="{{$newPosts[1]->pic_url}}">
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
		<div class="row">
			<div class="card category-card-fix">
				<div class="card-image waves-effect waves-block waves-light category-img-fix">
				  <img class="activator" src="{{$lyricPosts[0]->pic_url}}">
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
		<div class="row">
			<div class="card horizontal category-card-fix">
				<div class="card-image horizontal-img-fix">
					<img src="{{$lyricPosts[1]->pic_url}}">
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<p>{{$lyricPosts[1]->title}}</p>
					</div>
					<div class="card-action">
						<a href="#">This is a link</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card horizontal category-card-fix">
				<div class="card-image horizontal-img-fix">
					<img src="{{$lyricPosts[0]->pic_url}}">
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<p>{{$lyricPosts[0]->title}}</p>
					</div>
					<div class="card-action">
						<a href="#">This is a link</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Lyrics -->
<!-- PHP -->
<div class="col s12 m6">
	<div class="category-container">
		<h3 class="category-container-title border-top-yellow">{{$categories[2]->name}}</h3>
		<div class="row">
			<div class="card category-card-fix">
				<div class="card-image waves-effect waves-block waves-light category-img-fix">
				  <img class="activator" src="{{$phpPosts[0]->pic_url}}">
				</div>
				<div class="card-content">
				  <span class="card-title grey-text text-darken-4">{{$phpPosts[0]->title}}</span>
				  <p><a href="#">more</a></p>
				</div>
				<div class="card-reveal">
				  <span class="card-title grey-text text-darken-4">{{$phpPosts[0]->title}}<i class="material-icons right">close</i></span>
				  <p>{{$phpPosts[0]->content}}</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card horizontal category-card-fix">
				<div class="card-image horizontal-img-fix">
					<img src="{{$phpPosts[1]->pic_url}}">
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<p>{{$phpPosts[1]->title}}</p>
					</div>
					<div class="card-action">
						<a href="#">This is a link</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="card horizontal category-card-fix">
			<div class="card-image horizontal-img-fix">
				<img src="{{$phpPosts[2]->pic_url}}">
			</div>
			<div class="card-stacked">
				<div class="card-content">
					<p>{{$phpPosts[2]->title}}</p>
				</div>
				<div class="card-action">
					<a href="#">This is a link</a>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>



<!-- PHP -->
