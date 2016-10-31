@extends('backend/app')

@section('title','| Category')
@section('content')
  <div class="panel panel-warning">
    <div class="panel panel-heading">
      <h2 class="panel-title text-center">
        {{$category->name}}
        </h2>
    </div>
    <div class="panel-body">
      dd({{$category->slug}})
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Article</th>
            <th>Time</th>

          </tr>
          </thead>
          <tbody>

              @foreach ($articles as $article)
                  <tr>
                <td>({{$article->id}})</td>
                <td>{{$article->title}}</td>
                <td>{{$article->created_at}}</td>
                  </tr>
              @endforeach



          </tbody>
      </table>
    </div>

  </div>
@stop
