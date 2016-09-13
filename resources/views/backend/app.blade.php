<!DOCTYPE html>
<html>
    <head>
        <title>Backend Management</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        {!! Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
        {!! Html::style(url('css/bootstrap.css'))!!}
        {!! Html::style(url('css/animate.min.css'))!!}
        {!! Html::style(url('css/libs.css'))!!}
        {!! Html::script(url('js/bootstrap.js'))!!}
        {{-- {!! Html::script(url('js/npm.js'))!!} --}}
    </head>
    <body>

            <div class="content">

              <nav class="navbar navbar-default" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Backend</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
              <li ><a href="{{route('backend.article.index')}}">Article</a></li>
              <li><a href="{{route('backend.category.index')}}">Category</a></li>
              <li><a href="{{route('backend.tag.index')}}#">Tag</a></li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{url('logout')}}">Log out</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
        </nav>

            </div>
            <div class="container">
                @yield('content')
            </div>
    </body>
</html>
