@extends('blog/app')
@section('content')
    <div class="card-panel white">
        <div class="card-panel-container">
        <div class="row">
        <form class="col s12" method="POST" action="{{url('/article')}}" id="article_create_form">
            {{ csrf_field() }}
            <div class="row">
                <h4>Create Article</h4>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <label for="title">Title</label>
                    <input name="title" id="title" type="text" class="validate">
                </div>
            </div>
            <!-- 文章分類 下拉選單-->
            {{ Form::label('category_id', 'Category:') }}
            {{ Form::select('category_id',$categories)}}
            <div class="row">
                <div class="input-field col s12">
                    <label for="pic_url">Picture URL</label>
                    <input name="pic_url" id="pic_url" type="text" class="validate">
                </div>
            </div>
                <input name="date" type="date" class="datepicker">
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="content" id="content"></textarea>
                </div>
            </div>
        </form>
        </div>
        </div>
    </div>

    {!! Html::script('tinymce/js/tinymce/tinymce.min.js')!!}
    <script>
    
    $(document).ready(function() {
        $('select').material_select();
    });

    var editor_config = {
        height : "768",
        path_absolute : "{{ URL::to('/') }}/",
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern codesample"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media codesample",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }
            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };
    tinymce.init(editor_config);
    </script>
@stop
