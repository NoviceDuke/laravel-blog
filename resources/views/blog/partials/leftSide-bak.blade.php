<!-- New Articles -->
<div class="col s12 m12">
	<div class="category-container">
		<h3 class="category-container-title border-top-brown">New Article</h3>
		<div class="row">
			<div class="col s12 m6">
				<div class="card category-card-fix" style="margin-right:0px;">
				    <div class="card-image waves-effect waves-block waves-light card-img-fix">
				      <img class="activator" src="{{$newArticles[0]->pic_url}}">
				    </div>
				    <div class="card-content">
				      <span class="card-title grey-text text-darken-4">{{$newArticles[0]->title}}</span>
				      <p><a href="{{url($newArticles[0]->path())}}">more</a></p>
				    </div>
				    <div class="card-reveal">
				      <span class="card-title grey-text text-darken-4">{{$newArticles[0]->title}}<i class="material-icons right">close</i></span>
				      <p>{{$newArticles[0]->content}}</p>
				    </div>
				</div>
			</div>
			<div class="col s12 m6">
				<div class="card category-card-fix" style="margin-left:0px;">
					<div class="card-image waves-effect waves-block waves-light card-img-fix">
					  <img class="activator" src="{{$newArticles[1]->pic_url}}">
					</div>
					<div class="card-content">
					  <span class="card-title grey-text text-darken-4">{{$newArticles[1]->title}}</span>
					  <p><a href="{{url($newArticles[1]->path())}}">more</a></p>
					</div>
					<div class="card-reveal">
					  <span class="card-title grey-text text-darken-4">{{$newArticles[1]->title}}<i class="material-icons right">close</i></span>
					  <p>{{$newArticles[1]->content}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- New Articles -->
<!-- Lyrics -->
<div class="col s12 m6">
	<div class="category-container">
		<h3 class="category-container-title border-top-red">{{$categories[0]->name}}</h3>
		<div class="row">
			<div class="card category-card-fix">
				<div class="card-image waves-effect waves-block waves-light card-img-fix">
				  <img class="activator" src="{{$lyricArticles[0]->pic_url}}">
				</div>
				<div class="card-content">
				  <span class="card-title grey-text text-darken-4">{{$lyricArticles[0]->title}}</span>
				  <p><a href="{{url($lyricArticles[0]->path())}}">more</a></p>
				</div>
				<div class="card-reveal">
				  <span class="card-title grey-text text-darken-4">{{$lyricArticles[0]->title}}<i class="material-icons right">close</i></span>
				  <p>{{$lyricArticles[0]->content}}</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card horizontal category-card-fix">
				<div class="card-image">
					<img src="{{$lyricArticles[1]->pic_url}}">
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<p>{{$lyricArticles[1]->title}}</p>
					</div>
					<div class="card-action">
						<a href="{{url($lyricArticles[1]->path())}}">This is a link</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card horizontal category-card-fix">
				<div class="card-image">
					<img src="{{$lyricArticles[2]->pic_url}}">
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<p>{{$lyricArticles[2]->title}}</p>
					</div>
					<div class="card-action">
						<a href="{{url($lyricArticles[2]->path())}}">This is a link</a>
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
				<div class="card-image waves-effect waves-block waves-light card-img-fix">
				  <img class="activator" src="{{$phpArticles[0]->pic_url}}">
				</div>
				<div class="card-content">
				  <span class="card-title grey-text text-darken-4">{{$phpArticles[0]->title}}</span>
				  <p><a href="{{url($phpArticles[0]->path())}}">more</a></p>
				</div>
				<div class="card-reveal">
				  <span class="card-title grey-text text-darken-4">{{$phpArticles[0]->title}}<i class="material-icons right">close</i></span>
				  <p>{{$phpArticles[0]->content}}</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card horizontal category-card-fix">
				<div class="card-image">
					<img src="{{$phpArticles[1]->pic_url}}">
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<p>{{$phpArticles[1]->title}}</p>
					</div>
					<div class="card-action">
						<a href="{{url($phpArticles[1]->path())}}">This is a link</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="card horizontal category-card-fix">
			<div class="card-image">
				<img src="{{$phpArticles[2]->pic_url}}">
			</div>
			<div class="card-stacked">
				<div class="card-content">
					<p>{{$phpArticles[2]->title}}</p>
				</div>
				<div class="card-action">
					<a href="{{url($phpArticles[2]->path())}}">This is a link</a>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>



<!-- PHP -->
