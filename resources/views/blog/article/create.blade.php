@extends('blog.layouts.app')
@section('title', '- 建立文章')
@section('content')
    <div class="card-panel white">
        <div class="card-panel-container">
        <div class="row">
        {!! Form::open(['url' => url('/article'), 'method' => 'POST', 'class' => 'awesome', 'id'=> 'article_create_form']) !!}
            <h4>Create Article</h4>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::text('title', old('title'), ['id' => 'title','class'=>'validate']) !!}
                    {!! Form::label('title', 'Title') !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::select('category_id', $categories) !!}
                    {!! Form::label('category_id', 'Category') !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <div class="chips chips-placeholder" id="tag">Tag</div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::text('pic_url', old('pic_url'), ['id' => 'pic_url','class'=>'validate']) !!}
                    {!! Form::label('pic_url', 'Picture URL') !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::label('date', 'Date') !!}
                    {!! Form::date('date', \Carbon\Carbon::now()->format('d F, Y'), ['class' => 'datepicker']) !!}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    {!! Form::textarea('content', old('content'), ['id' => 'content']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
        </div>
    </div>
    @section('javascript')
    <script>
    $(document).ready(function() {
        $('input.input').autocomplete({
          data: {
              @foreach ($tags as $tag)
              "{{$tag->name}}":null,
              @endforeach
          }
        });
    });
    </script>
    @endsection

    @include('partials.tinymce-script')
@stop
