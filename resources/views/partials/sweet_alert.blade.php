
@if(session()->has('alert_message'))
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
