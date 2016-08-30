@extends('blog/app')

@section('title','| Edit Blog Article')
@section('content')


    <div class="row">
  {!! Form::model($articles,['route'=>['backend.article.update',$articles->id]])!!}
      <div class="col s8">
        {{Form::text('title',null,['class'=>'form-control'])}}
        {{Form::textarea('content',null,['class'=>'form-control'])}}
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
              {!! Html::linkRoute('backend.article.show','Canceal',array($articles->id),array('class'=>'btn btn-danger waves-effect waves-light btn'))!!}
            </div>
            <div class="col s4">
              {!! Html::linkRoute('backend.article.update','Save',array($articles->id),array('class'=>'btn btn-success waves-effect waves-light btn'))!!}
            </div>
          </div>
        </div>
      </div>
      {!!Form::close()!!}
    </div>


@stop
