@extends('hchs/app')
@section('content')
   
            <!--Static Cut Left Panel 75%-->
            <div style="width: 75%;float:left;">
						<!--Card-->
					    <div class="card medium hoverable">
					      <div class="card-image waves-effect waves-block waves-light">
					      <img class="activator" src="http://materializecss.com/images/sample-1.jpg">
					      </div>
					      <div class="card-content">
					      <span class="card-title  grey-text text-darken-4 ">Card Title
					      <i class="card-title material-icons right activator">more_vert</i></span>
					      
					      </div>
					      <div class="card-reveal">
					      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					      <p>Static  Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only </p>
					      <a clss="left" href="http://www.google.com">more</a>
					    </div>
					    </div>
					    <!--Card-->
			</div>     
			<!--Static Cut Left Panel 75%-->
			<!--Static Cut Right Panel 22%-->
			<div style="width: 22%;float:right;">
			      	    <div class="card medium hoverable">
			      	    	<div class="collection">
							    <a href="#!" class="collection-item">Alan<span class="badge">1</span></a>
							    <a href="#!" class="collection-item">Marry<span class="new badge">4</span></a>
							    <a href="#!" class="collection-item">Jason</a>
							    <a href="#!" class="collection-item">Whatever<span class="badge">14</span></a>
							</div>
							<div style="text-align:center;">
								   <i class="large material-icons" style="margin-top:50px;">perm_identity</i>
							</div>

			      	    </div>
			      	    
			      
			</div>
			<!--Static Cut Right Panel 22%-->
            


             <!--三個一排的Card 垃圾寫法-->
			 @foreach($posts as $key=>$post)
				 @if($key%3==0)
				 <div class="row">
				 <div class="col s4">
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
				 <div class="col s4">
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
				 <div class="col s4">
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
			 @endforeach
			<!--三個一排的Card 垃圾寫法-->



@endsection