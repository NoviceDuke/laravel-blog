<!DOCTYPE html>
<html>
    <head>
        <title>Blog @yield('title')</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        {!! Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
        {!! Html::style(url('materialize/css/materialize.css'))!!}
        {!! Html::style(url('css/blog-styles.css'))!!}
        {!! Html::style(url('css/animate.min.css'))!!}
        {!! Html::style(url('css/libs.css'))!!}

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!--Scripts Start-->
        <script type="text/javascript">
            //empty now
        </script>
        <!--Scripts End-->
    </head>

    <body background="{{url('png/hchs_background.png')}}">
        <!--  Top Navigation  -->
        <nav class="blue-grey darken-2 nav-height-fix">
            <div class="nav-wrapper blue-grey darken-2 nav-content-fix">
              <a href="{{url('/')}}" class="brand-logo logo-fix">Blog Home</a>
              <ul class="right hide-on-med-and-down">
                @if(Auth::user())
                    <li><a href="{{url('logout')}}">登出</a></li>
                @else
                    <li><a href="{{url('login')}}">登入</a></li>
                @endif
              </ul>

            <!--Mobile DropDown Button-->
            <a class="dropdown-button hide-on-large-only" href="#!" data-activates="dropdown1">
            <i class="material-icons" style="margin-left:10px;">menu</i>
            <i class="mdi-navigation-arrow-drop-down right"></i>
            </a>
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="{{url('/')}}">Home</a></li>
                @if(Auth::user())
                    <li><a href="{{url('logout')}}">登出</a></li>
                @else
                    <li><a href="{{url('login')}}">登入</a></li>
                @endif
            </ul>
            <!--Mobile DropDown Button-->
            </div>
        </nav>
		<!--  Top Navigation  -->


        <!--  Floating Button -->
        @inject('floatingButtonPresenter', 'App\Presenters\FloatingButtonPresenter')
        <div class="fixed-action-btn float-position">
            {!! $floatingButtonPresenter->getFloatinButton() !!}
        </div>
    	<!--  Floating Button -->


        <div class="container">
            @yield('content')
        </div>



    </body>
    {!! Html::script(url('materialize/js/materialize.js'))!!}
    {!! Html::script(url('js/blog-styles.js'))!!}
    {!! Html::script(url('js/libs.js'))!!}
    
    <!--  js section -->
    @yield('javascript')
    <!--  js section -->

    <!--  sweet_alert -->
    @include('partials.sweet_alert')
    <!--  sweet_alert -->
</html>
