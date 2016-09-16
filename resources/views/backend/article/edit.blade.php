@extends('backend/app')

@section('title','| Edit Blog Article')
@section('content')

@if(Session::has('flash_message'))
  <div class="alert alert-success">
     {{Session::get('flash_message')}}

  </div>
@endif
    <div class="row">
  {!! Form::model($articles,['method'=>'PATCH','route'=>['backend.article.update',$articles->id]])!!}
      <div class="col s8">
        {{Form::label('title','Title:',['class'=>'control-label'])}}
        {{Form::text('title',null,['class'=>'form-control input-lg'])}}
        {{Form::label('content','Content:','form-spacing-top',['class'=>'control-label'])}}
        {{Form::textarea('content',null,['class'=>'form-control'])}}
      </div>
      <div class="col s4">
        <div class="well" style="margin-top:15px;">
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
              {{$articles->updated_at}}
            </dd>
          </dl>
          <hr />
          <div class="row">
            <div class="col s6 form-group">
              {{Form::submit('Save',['class'=>'btn btn-success btn-block'])}}
            </div>
            <div class="col s6">
                {!! Html::linkRoute('backend.article.show','Canceal',array($articles->id),array('class'=>'btn btn-danger btn-block'))!!}
            </div>
          </div>
        </div>
      </div>
      {!!Form::close()!!}
    </div>

@include('partials.tinymce-script')
@stop
