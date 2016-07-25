@extends('blog/app')
@section('content')
    <div class="card-panel white">
        <div class="card-panel-container">
        <div class="row">
        <form class="col s12" method="POST" action="{{url('/post')}}" id="post_create_form">
            {{ csrf_field() }}
            <div class="row">
                <h4>Create A Post</h4>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="title">Title</label>
                    <input name="title" id="title" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="pic_url">Picture URL</label>
                    <input id="pic_url" type="text" class="validate">
                </div>
            </div>
            <input type="date" class="datepicker">
            <div class="row">
                <div class="input-field col s12">
                    <label for="content">Content</label>
                  <textarea id="content" class="materialize-textarea"></textarea>
                </div>
            </div>
        </form>
        </div>
        </div>
    </div>
    @if(count($errors))
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif

    <script>
    $('.datepicker').pickadate({
          selectMonths: true, // Creates a dropdown to control month
          selectYears: 2 // Creates a dropdown of 15 years to control year
    });
    function post_create_submit()
    {
       document.getElementById('post_create_form').submit();
    }
    </script>
@stop
