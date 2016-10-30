@extends('backend/app')

@section('title','| Article')
@section('content')
  <div class="panel panel-success">
    <div class="panel panel-heading">
      <h3 class="panel-title">
        <div class="row">
          <div class="text-center">
            {{$articles->title}}
          </div>
        </div>
      </h3>
    </div>


    <div class="panel panel-body">

      <p>{{$articles->content}}</p>
    </div>
    <div class="panel panel-footer">
      <div class="row">
        <div class="col-md-6 text-center">
          發表於 {{$articles->created_at}}
        </div>
          <div class="col-md-6 text-center">
            修改於 {{$articles->updated_at}}
          </div>


      </div>

    </div>
  </div>


          <div class="row">
            <div class="col-md-4">
              <a href="/backend/article/{{$articles->id}}" class="btn btn-danger">Edit</a>
              <!--{!! Html::linkRoute('backend.article.edit','Edit',array($articles->id),array('class'=>'btn btn-danger '))!!}
              -->
            </div>
            <div class="col-md-4">
              <a href="/backend/article" class="btn btn-success">Back</a>
              <!--
              {!! Html::linkRoute('backend.article.index','Back',array($articles->id),array('class'=>'btn btn-success '))!!}
            -->
            </div>
          </div>
        </div>
      </div>

@stop
