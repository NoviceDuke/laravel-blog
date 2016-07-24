@extends('blog/app')
@section('content')
<div class="row">
  <!--Static Cut Left Panel 75%-->

          <div class="col s12 m9">
            <div class="card">
              <div class="card-image">
                <img src="{{$post->pic_url}}">
                <span class="card-title">{{$post->title}}</span>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
              </div>
            </div>
          </div>

  <!--Static Cut Left Panel 75%-->
  <!--Static Cut Right Panel 25%-->
  <div class="col s12 m3">
    @include('blog.rightSide')
  </div>
  <!--Static Cut Right Panel 25%-->
</div>
@endsection
