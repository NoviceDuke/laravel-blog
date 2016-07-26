<!--Card-->
<!-- <div class="card medium hoverable">
	<div class="card-image waves-effect waves-block waves-light">
	<img class="activator" src="http://materializecss.com/images/sample-1.jpg">
	</div>
	<div class="card-content">
	<span class="card-title  grey-text text-darken-4 ">Card Title
	<i class="card-title material-icons right activator">more_vert</i></span>

	</div>
	<div class="card-reveal">
	<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
	<p>Static  Here is some more information</p>
	<a clss="left" href="http://www.google.com">more</a>
	</div>
</div> -->
<!--Card-->
<div class="slider-section">
<div class="slider">
  <ul class="slides">
    <li>
      <img src="http://lorempixel.com/580/250/nature/1"> <!-- random image -->
      <div class="caption center-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div>
    </li>
    <li>
      <img src="http://lorempixel.com/580/250/nature/2"> <!-- random image -->
      <div class="caption left-align">
        <h3>Left Aligned Caption</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div>
    </li>
    <li>
      <img src="http://lorempixel.com/580/250/nature/3"> <!-- random image -->
      <div class="caption right-align">
        <h3>Right Aligned Caption</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div>
    </li>
    <li>
      <img src="http://lorempixel.com/580/250/nature/4"> <!-- random image -->
      <div class="caption center-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
      </div>
    </li>
  </ul>
</div>
</div>
@foreach($posts as $key=>$post)

<div class="row">
	<div class="col s12 m6">
        <div class="card small">
		    <div class="card-image waves-effect waves-block waves-light">
		    	<img class="activator" src="{{$post->pic_url}}">
		    </div>
		    <div class="card-content">
		    	<span class="card-title activator grey-text text-darken-4">{{$post->title}}<i class="material-icons right">more_vert</i></span>
		      	<p><a href="{{url($post->path())}}">more</a></p>
		    </div>
		    <div class="card-reveal">
		      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
		      <p>Here is some more information about this product that is only revealed once clicked on.</p>
		    </div>
		</div>
	</div>
	<div class="col s12 m6">
        <div class="card-panel teal">
          <span class="white-text">I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
          I am convenient because I require little markup to use effectively.
          </span>
        </div>
        <div class="card-panel grey lighten-5 z-depth-1" style="margin-top:25px;">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="http://materializecss.com/images/yuna.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">
                This is a square image. Add the "circle" class to it to make it appear circular.
              </span>
            </div>
          </div>
        </div>
	</div>
</div>

@endforeach






<!--三個一排的Card 垃圾寫法-->
{{--  @foreach($posts as $key=>$post)
	 @if($key%3==0)
	 <div class="row">
	 <div class="col s12 m4">
	 		<div class="card medium hoverable">
		      <div class="card-image waves-effect waves-block waves-light">
		      <img class="activator" src="{{$post->pic_url}}">
		      </div>
		      <div class="card-content">
		      <span class="card-title  grey-text text-darken-4 ">{{$post->title}}
		      <i class="card-title material-icons right activator">more_vert</i></span>

		      </div>
		      <div class="card-reveal">
		      <span class="card-title grey-text text-darken-4">{{$post->title}}<i class="material-icons right">close</i></span>
		      <p>{{$post->content}} </p>
		      <a clss="left" href="/hchs">more</a>
		      </div>
		    </div>
	 </div>
	 @elseif($key%3==1)
	 <div class="col s12 m4">
	 <div class="card medium hoverable">
		      <div class="card-image waves-effect waves-block waves-light">
		      <img class="activator" src="{{$post->pic_url}}">
		      </div>
		      <div class="card-content">
		      <span class="card-title  grey-text text-darken-4 ">{{$post->title}}
		      <i class="card-title material-icons right activator">more_vert</i></span>

		      </div>
		      <div class="card-reveal">
		      <span class="card-title grey-text text-darken-4">{{$post->title}}<i class="material-icons right">close</i></span>
		      <p>{{$post->content}} </p>
		      <a clss="left" href="/hchs">more</a>
		      </div>
		    </div>
	 </div>
	 @else
	 <div class="col s12 m4">
	 <div class="card medium hoverable">
		      <div class="card-image waves-effect waves-block waves-light">
		      <img class="activator" src="{{$post->pic_url}}">
		      </div>
		      <div class="card-content">
		      <span class="card-title  grey-text text-darken-4 ">{{$post->title}}
		      <i class="card-title material-icons right activator">more_vert</i></span>

		      </div>
		      <div class="card-reveal">
		      <span class="card-title grey-text text-darken-4">{{$post->title}}<i class="material-icons right">close</i></span>
		      <p>{{$post->content}} </p>
		      <a clss="left" href="/hchs">more</a>
		      </div>
		    </div>
	 </div>
	 </div>

	 @endif
 @endforeach --}}
<!--三個一排的Card 垃圾寫法-->
