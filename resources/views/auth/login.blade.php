@extends('layouts.html')
@section('content')
<div class="container">
    <div class="row" style="margin-top:50px;">
        <form class="col s12" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="row">
            <div class="input-field col s12">
                <label for="email" data-error="wrong"  data-success="right">E-Mail Address</label>
                <input id="email" type="email" class="validate" name="email" value="">
            </div>
            </div>
            <div class="row">
            <div class="input-field col s12">
                <label for="password">Password</label>
                <input id="password" type="password" class="validate" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            </div>

            @if ($errors->has('email'))
                        <span class="pink-text text-darken-2">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
            @endif
            <p>
                <input type="checkbox" id="remember" />
                <label for="remember">Remember Me</label>
            </p>


            <div class="row">
                <div class="col s12">
                    <button name="LOGIN" type="submit" class="waves-effect waves-light btn">
                        LOGIN
                    </button>
                    <a href='redirect_to_fb' class="btn waves-effect waves-light" type="submit" name="FB Login">FB Login
                        <i class="material-icons left"></i>
                    </a>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
