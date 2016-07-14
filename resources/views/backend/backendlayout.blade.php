<!DOCTYPE html>
<html>
    <head>
        <title>Blog Backend</title>
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
    <body>
        <div class="container">

            @yield('content')
         
        </div>
    </body>
</html>