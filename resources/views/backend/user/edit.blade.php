@extends('backend/app')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">

            {!! Form::open(['url' => route('backend.user.update', $user->id), 'method' => 'PATCH']) !!}
            <h4>Edit User</h4>
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', $user->name, ['class' => 'form-control', 'id' => 'name']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', $user->email, ['class' => 'form-control', 'id' => 'email']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password (optional)') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit('Update Me!',['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

    </div>
</div>
@endsection
