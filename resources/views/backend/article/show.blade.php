@extends('blog/app')

@section('title','| Article')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col s8">
        <h1>{{$articles->title}}</h1>
        <p>{{$articles->content}}</p>
      </div>
    </div>



    </div>
@stop
