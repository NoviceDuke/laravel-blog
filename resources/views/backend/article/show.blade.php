@extends('blog/app')

@section('title','| Article')
@section('content')
  <div >
    <div class="row">
      <div class="col s8">
        <h1>{{$articles->title}}</h1>
        <p>{{$articles->content}}</p>
      </div>
      <div class="col s4">
        <div class="well">
          <dl class="dl-horizontal">
            <dt>
              Created At:
            </dt>
            <dd>
              {{$articles->created_at}}
            </dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>
              Updated At:
            </dt>
            <dd>
              {{$articles->update_at}}
            </dd>
          </dl>
          <hr />
          <div class="row">
            <div class="col s4">
              {!! Html::linkRoute('backend.article.edit','Edit',array($articles->id),array('class'=>'btn btn-danger waves-effect waves-light btn red'))!!}
            </div>
            <div class="col s4">
              {!! Html::linkRoute('backend.article.update','Save',array($articles->id),array('class'=>'btn btn-success waves-effect waves-light btn'))!!}
            </div>
          </div>
        </div>
      </div>

@stop
