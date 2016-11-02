<!-- Laravel在進行驗證時，拋出的errors Session必須優先處理 -->
@if(session()->has('errors'))
    @inject('errorsPresenter', 'App\Presenters\ErrorsSessionPresenter')
    <script>
    swal({
        title: "Error",
        text: "{!! $errorsPresenter->getFormatedMessage($errors)!!}",
        type: "error",
        showConfirmButton:true
    });
    </script>
<!-- 在controller裡面使用alert()->flashIt() method時的alert -->
@elseif(session()->has('alert_message'))
    <script>
        swal({
            title: "{{session('alert_message.title')}}",
            text: "{{session('alert_message.message')}}",
            type: "{{session('alert_message.level')}}",
            timer: 1800,
            showConfirmButton:false
        });
    </script>
@endif
