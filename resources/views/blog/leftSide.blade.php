123456






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