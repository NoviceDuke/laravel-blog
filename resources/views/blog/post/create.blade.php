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
                <input name="date" type="date" class="datepicker">
            <div class="row">
                <div class="input-field col s12">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="materialize-textarea"></textarea>
                </div>
            </div>
        </form>
        </div>
        </div>
    </div>
    @if(count($errors)>0)
            <toast data-error='{{$errors->first()}}'></toast>
    @endif
@stop
