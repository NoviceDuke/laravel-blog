@extends('hchs/app')
@section('content')
   
       <div class="container">
             <div class="row">
			      <div class="col s8">
					  <div class="card medium">
					    <div class="card-image waves-effect waves-block waves-light">
					      <img class="activator" src="http://materializecss.com/images/sample-1.jpg">
					    </div>
					    <div class="card-content">
					      <span class="card-title  grey-text text-darken-4 ">Card Title
					      <i class="card-title material-icons right activator">more_vert</i></span>
					      
					    </div>
					    <div class="card-reveal">
					      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					      <p>Here is some more information about this product that is only revealed once clicked on.</p>
					    </div>
					  </div>
			      </div>
			      <div class="col s4">This div is 4444444444444-columns wide</div>
			 </div>
       </div>

@endsection