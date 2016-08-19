@extends('blog/app')
@section('content')
<div class="col s12">
    <div class="card">
        <div class="card-image">
            <img src="{{$article->pic_url}}">
            <span class="card-title">{{$article->title}}</span>
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
@endsection
