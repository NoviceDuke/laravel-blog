<!DOCTYPE html>
<html>
    <head>
        <title>HCHS Blog Trace Page</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        {!! Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
        {!! Html::script('materialize/js/materialize.js')!!}
        {!! Html::style('materialize/css/materialize.css')!!}
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!--Scripts Start-->
        <script type="text/javascript">
        	$(document).ready(function(){
			    $("#btn-floating-green").click(function(){
			        $('html,body').animate({
			        	scrollTop: 0
			        },750);
			    });
			});
        </script>
        <!--Scripts End-->

    </head>

    <body background="png/hchs_background.png">
        <!--  Top Navigation  -->
          <nav>
            <div class="nav-wrapper blue-grey darken-2">
              <a href="#!" class="brand-logo">Leja Logo</a>
              <ul class="right hide-on-med-and-down">
                <li><a href="/">Home</a></li>
                <li><a href="logout">Log out</a></li>
              </ul>

            <!--Mobile DropDown Button-->
            <a class="dropdown-button hide-on-large-only" href="#!" data-activates="dropdown1">
            <i class="material-icons">menu</i>
            <i class="mdi-navigation-arrow-drop-down right"></i>
            </a>
            <ul id='dropdown1' class='dropdown-content'>
                 <li><a href="/">Home</a></li>
                 <li><a href="logout">Log out</a></li>
            </ul>
            <!--Mobile DropDown Button-->
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
		      <li><a class="btn-floating green" id="btn-floating-green"><i class="material-icons">publish</i></a></li>
		      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
		    </ul>
    	</div>
    	<!--  Floating Button -->

	    <div class="container">

         	@yield('content')
         
 		</div>
    </body>
</html>
