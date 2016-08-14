@extends('blog/app')
@section('content')
    <div class="card-panel white">
        <div class="card-panel-container">
        <div class="row">
        <form class="col s12" method="POST" action="{{url('/article')}}" id="article_create_form">
            {{ csrf_field() }}
            <div class="row">
                <h4>Create A Article</h4>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <label for="title">Title</label>
                    <input name="title" id="title" type="text" class="validate">
                </div>
            </div>
            <!-- 文章分類 下拉選單-->
                <!-- Formbuilder 似乎無法做到動態抓取(可能可以)
                  先使用一般HTML去抓
                -->
                {{ Form::label('category_id', 'Category:') }}

                {{ Form::select('category_id',$categories)}}



            <div class="row">
                <div class="input-field col s12">
                    <label for="pic_url">Picture URL</label>
                    <input id="pic_url" type="text" class="validate">
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
    @if(count($errors)>0)
            <toast data-error='{{$errors->first()}}'></toast>
    @endif


    {!! Html::script('tinymce/js/tinymce/tinymce.min.js')!!}
    <script>
    /* Material 的Select標籤 需要在JS裡面初始化，因為他有動畫，這裡槓掉，寫在resource\assets\js\blog-style.js
    $(document).ready(function() {
        $('select').material_select();
    });
    */
    var editor_config = {
        path_absolute : "/",
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
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
