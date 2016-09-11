<!-- Search -->
<div class="row">
  	<div class="col s12 m12">
		<div class="category-container">
		<h3 class="category-container-title title-fix">Search</h3>
			<div class="row">
			  <div class="input-field col s12 m12">
				<i class="material-icons prefix search-icon-fix">search</i>
				<input class="search-input" type="text" id="autocomplete">
			  </div>
			</div>
		</div>
	</div>
</div>
<!-- Search -->
<!-- Author Changer -->
<div class="row">
	<div class="col s12 m12">
		<div class="category-container">
			<h3 class="category-container-title title-fix">Authors</h3>
            <div class="carousel carrousel-fix">
            <a class="carousel-item carrousel-item-fix" href="#one!"><div class="carousel-item-container circle"><img class="circle carrousel-img" src="https://static-secure.guim.co.uk/sys-images/Guardian/Pix/pictures/2014/9/26/1411724026290/Kim-Jong-un-012.jpg" /></div></a>
            <a class="carousel-item carrousel-item-fix" href="#two!"><div class="carousel-item-container circle"><img class="circle carrousel-img" src="https://c.o0bg.com/rf/image_960w/Boston/2011-2020/2016/05/01/BostonGlobe.com/Lifestyle/Images/2016-05-01T011809Z_1744412349_S1BETBLIUBAA_RTRMADP_3_USA-OBAMA-DINNER.jpg" /></div></a>
            <a class="carousel-item carrousel-item-fix" href="#three!"><div class="carousel-item-container circle"><img class="circle carrousel-img" src="https://upload.wikimedia.org/wikipedia/commons/1/1b/%E8%94%A1%E8%8B%B1%E6%96%87%E5%AE%98%E6%96%B9%E5%85%83%E9%A6%96%E8%82%96%E5%83%8F%E7%85%A7.png" /></div></a>
            <a class="carousel-item carrousel-item-fix" href="#four!"><div class="carousel-item-container circle"><img class="circle carrousel-img" src="http://att.bbs.duowan.com/forum/201205/22/2102376ttttt338u3yh8pt.jpg" /></div></a>
            <a class="carousel-item carrousel-item-fix" href="#five!"><div class="carousel-item-container circle"><img class="circle carrousel-img" src="https://c7.staticflickr.com/4/3492/3464131894_00370eb765.jpg" /></div></a>
            </div>
		</div>
	</div>
</div>
<!-- Author Changer -->
<!-- Categories -->
<div class="row">
	<div class="col s12 m12">
		<div class="category-container">
			<h3 class="category-container-title title-fix">Categories</h3>
			<div class="collection collection-fix">
                @foreach($categories as $category)
                <a href="#!" class="collection-item border-right-{{$category->css_class}} grey-text">{{$category->name}}</a>
                @endforeach
			</div>
		</div>
	</div>
</div>
<!-- Categories -->
<!-- module -->
<div class="row">
	<div class="col s12 m12">
		<div class="category-container">
			<h3 class="category-container-title title-fix">Module</h3>
            <div class="valign-wrapper module-1">
                <h5 class="module-text">Module</h5>
            </div>
		</div>
	</div>
</div>
<!-- module -->
<!-- module -->
<div class="row">
	<div class="col s12 m12">
		<div class="category-container">
			<h3 class="category-container-title title-fix">Module</h3>
            <div class="valign-wrapper module-1">
                <h5 class="module-text">Module</h5>
            </div>
		</div>
	</div>
</div>
<!-- module -->
