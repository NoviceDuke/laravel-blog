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
        @yield('meta')
        <!--Scripts Start-->
        <script type="text/javascript">
            //empty now
        </script>
        <!--Scripts End-->
    </head>
    <style>
    .my-loading-nav {
        width: 100px;
        height: 100px;
        background-color: red;
        -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
        -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
        animation-name: example;
        animation-duration: 4s;
    }
    </style>
    @inject('authPresenter', 'App\Presenters\AuthPresenter')
    @inject('floatingButtonPresenter', 'App\Presenters\FloatingButtonPresenter')
    <body background="{{url('png/hchs_background.png')}}">
        <span id="app">
        <!--  Top Navigation  -->


        <nav id="loading-nav" class="blue-grey darken-2 nav-height-fix">
            <span class="loading-nav"></span>
            <div class="progress progress-fix">
                <div class="indeterminate"></div>
            </div>
        </nav>
        <navbar :islogin="{{$authPresenter->isLogin()}}"
                 baseurl="{{url('')}}">
        </navbar>
		<!--  Top Navigation  -->

        <!--  Floating Button -->
        <div class="fixed-action-btn float-position">
            {!! $floatingButtonPresenter->getFloatinButton() !!}
        </div>
    	<!--  Floating Button -->


        <div class="container main-container">
            @yield('content')
        </div>


    </span>
    </body>
    @include('blog.partials.footer')
    {!! Html::script(url('js/app.js'))!!}
    {!! Html::script(url('js/blog-styles.js'))!!}
    {!! Html::script(url('materialize/js/materialize.js'))!!}
    {!! Html::script(url('js/libs.js'))!!}

    <!--  js section -->
    @yield('javascript')
    <!--  js section -->

    <!--  sweet_alert -->
    @include('partials.sweet_alert')
    <!--  sweet_alert -->
</html>
