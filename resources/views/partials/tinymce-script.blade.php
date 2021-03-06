<!--引入tinymce js-->
{!! Html::script('tinymce/js/tinymce/tinymce.min.js')!!}
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>

<!--初始化 tinymce-->
<script>
var editor_config = {
    height : "512",
    path_absolute : "{{ URL::to('/') }}/",
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "textcolor searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern codesample"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media codesample",
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
$(document).ready(function() {
     $('#lfm').filemanager('image');
});

</script>
