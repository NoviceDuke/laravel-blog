<!-- Search -->
<div class="row">
  	<div class="col s12 m12">
		<div class="category-container">
		<h3 class="category-container-title title-fix">Search</h3>
			<div class="row">
			  <div class="input-field col s12 m12">
                {!! Form::open(['url' => url('/filter'), 'method' => 'GET', 'class' => 'awesome', 'id'=> 'search']) !!}
				<i class="material-icons prefix search-icon-fix">search</i>
				<input name="search" class="search-input" type="text" id="search">
                {!! Form::close() !!}
			  </div>
			</div>
		</div>
	</div>
</div>
<!-- Search -->
<!-- Categories -->
<div class="row">
	<div class="col s12 m12">
		<div class="category-container">
			<h3 class="category-container-title title-fix">Categories</h3>
			<div class="collection collection-fix">
                @foreach($categories as $category)
                <a href="{{url($category->path())}}" class="collection-item border-right-{{$category->style->css}} grey-text">{{$category->name}}</a>
                @endforeach
			</div>
		</div>
	</div>
</div>
<!-- Categories -->
<!-- TagCloud -->
<div class="row">
    <div class="col s12 m12">
        <div class="category-container">
            <h3 class="category-container-title title-fix">Tags</h3>
            <div class="tags-container">
                <div class="row">
                    <div class="col s11 m11">
                    @foreach ($tags as $tag)
                        <a href="{{url($tag->path())}}"><span class="tag tag-element">{{$tag->name}}</span></a>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TagCloud -->
