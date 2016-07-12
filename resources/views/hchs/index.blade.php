@extends('hchs/app')
@section('content')
   
			<div class="container">
             <div class="row">
			      <div class="col s8">
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
					      <p>Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only revealed once clicked on.Here is some more information about this product that is only </p>
					      <a clss="left" href="http://www.google.com"">more</a>
					    </div>
					    </div>
					    <!--Card-->
			      </div>
			      <div class="col s4">
			      	    <div class="card medium hoverable">
			      	    	 <div class="collection">
							    <a href="#!" class="collection-item">Alan<span class="badge">1</span></a>
							    <a href="#!" class="collection-item">Alan<span class="new badge">4</span></a>
							    <a href="#!" class="collection-item">Alan</a>
							    <a href="#!" class="collection-item">Alan<span class="badge">14</span></a>
							 </div>
			      	    </div>
			      </div>
			 </div>
			 </div>




			 @foreach($posts as $post)
			   {{$post->title}}
			 @endforeach


@endsection