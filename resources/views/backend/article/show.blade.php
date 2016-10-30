@extends('backend/app')

@section('title','| Article')
@section('content')
  <div class="panel panel-success">
    <!--Head-->
    <div class="panel panel-heading">
      <h3 class="panel-title">
        <div class="row">
          <div class="text-center">
            {{$articles->title}}
            <span class="label label-info text-right">{{$articles->category->name}}</span>
          </div>
        </div>

      </h3>
    </div>
    <!--Body-->
    <div class="panel panel-body">
      {!! $articles->content !!}
    </div>
    <!--Footer-->
    <div class="panel panel-footer">
      <div class="row">
        <!--time-->
        <div class="col-md-4 text-center">
          發表於 {{$articles->created_at}}
        </div>
          <div class="col-md-4 text-center">
            修改於 {{$articles->updated_at}}
          </div>
          <!--Button-->
          <div class="col-md-3 text-right">
            <a href="/backend/article/{{$articles->id}}/edit" class="btn btn-danger">編輯</a>
            <a href="/backend/article" class="btn btn-success">返回</a>
          </div>
        </div>
      </div>
  </div>



@stop
