<!DOCTYPE html>
<html>
    <head>
        <title>HCHS Blog Trace Page</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        {!! Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
        {!! Html::script('materialize/js/materialize.js')!!}
        {!! Html::style('materialize/css/materialize.css')!!}
        {!! Html::style(url('css/blog-styles.css'))!!}
        {!! Html::style(url('css/animate.min.css'))!!}
        {!! Html::script(url('js/blog-styles.js'))!!}

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!--Scripts Start-->
        <script type="text/javascript">
            //empty now
        </script>
        <!--Scripts End-->
    </head>

    <body background="png/hchs_background.png">
        <!--  Top Navigation  -->
        <nav class="blue-grey darken-2 nav-height-fix">
            <div class="nav-wrapper blue-grey darken-2 nav-content-fix">
              <a href="{{url('/')}}" class="brand-logo logo-fix">HCHS's Blog</a>
              <ul class="right hide-on-med-and-down">
                <li><a href="{{url('/')}}"><i class="material-icons nav-icon-fix">home</i></a></li>
                <li><a href="{{route('categories.index')}}">Category</a></li>
                <li><a href="{{url('/logout')}}">Log out</a></li>
              </ul>

            <!--Mobile DropDown Button-->
            <a class="dropdown-button hide-on-large-only" href="#!" data-activates="dropdown1">
            <i class="material-icons" style="margin-left:10px;">menu</i>
            <i class="mdi-navigation-arrow-drop-down right"></i>
            </a>
            <ul id='dropdown1' class='dropdown-content'>
                 <li><a href="{{url('/')}}">Home</a></li>
                 <li><a href="{{url('logout')}}">Log out</a></li>
            </ul>
            <!--Mobile DropDown Button-->
            </div>
        </nav>
		<!--  Top Navigation  -->


        <!--  Floating Button -->
        <div class="fixed-action-btn float-position">
            @if(Request::is('article/create'))
            <a id="article_create_submit" class="btn-floating btn-large blue" onclick="article_create_submit();">
                <i class="large material-icons floating-fix" >done</i>
            </a>
            @elseif(Request::is('blog'))
		    <a id="float_menu" class="btn-floating btn-large red">
		        <i class="large material-icons floating-fix" >view_headline</i>
		    </a>
            @else
            <a id="float_previous" href="{{URL::previous()}}" class="btn-floating btn-large green">
                <i class="large material-icons floating-fix" >chevron_left</i>
            </a>
            @endif
		    <ul>
                @if(Request::is('blog'))
		        <li><a class="btn-floating blue" href="{{url('article/create')}}">
                    <i class="material-icons floating-fix">create</i></a>
                </li>
                @endif
                <li><a class="btn-floating green" id="btn-floating-green">
                    <i class="material-icons floating-fix">publish</i></a>
                </li>
		    </ul>
    	</div>
    	<!--  Floating Button -->

	    <div class="container">

         	@yield('content')

 		</div>
    </body>
</html>
