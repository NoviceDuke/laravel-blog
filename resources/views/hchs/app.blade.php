<!DOCTYPE html>
<html>
    <head>
        <title>HCHS Blog Trace Page</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        {!! Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
        {!! Html::script('materialize/js/materialize.js')!!}
        {!! Html::style('materialize/css/materialize.css')!!}
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <!--  Top Navigation  -->
		<nav>
		  <div class="nav-wrapper">
		    <a href="" class="brand-logo">　Blog Using Material Design Trace</a>
		    <ul id="nav-mobile" class="right hide-on-med-and-down">
		      <li><a href="">item1</a></li>
		      <li><a href="">item2</a></li>
		      <li><a href="">item3<span class="new badge">4</span></a></li>
		      
		    </ul>
		  </div>
		</nav>
		<!--  Top Navigation  -->


        <!--  Floating Button -->
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		    <a class="btn-floating btn-large red">
		      <i class="large material-icons">mode_edit</i>
		    </a>
		    <ul>
		      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
		      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
		      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
		      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
		    </ul>
    	</div>
    	<!--  Floating Button -->


         @yield('content')
         
     </div>
    </body>
</html>
