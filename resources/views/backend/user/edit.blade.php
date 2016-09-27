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
<div class="panel panel-default">
    <div class="panel-body">
        @if($user->isSuperRoot())
            <div class="form-group">
                <span>超級使用者不必操控任何權限</span>
            </div>
            {!! Form::open(['url' => route('backend.user.detach_root', $user->id), 'method' => 'PATCH']) !!}
            {!! Form::submit('不想當超級使用者!',['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['url' => route('backend.user.update_roles', $user->id), 'method' => 'PATCH']) !!}
            <h4>Edit User's Roles</h4>
            <div class="form-group">
                {{-- @foreach ($permissions as $index => $permission)
                    {!! Form::checkbox("permission[$index]", $permission->id, $user->hasPermission($permission->name)); !!}
                    {!! Form::label($permission->name, $permission->display_name) !!}
                @endforeach --}}
                @foreach ($roles as $index => $role)
                    {!! Form::checkbox("role[$index]", $role->id, $user->hasRole($role->name)); !!}
                    {!! Form::label($role->name, $role->display_name) !!}
                @endforeach
            </div>
            {!! Form::submit('Update Roles!',['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        @endif
    </div>
</div>
{!! Html::script(asset('js/hchs_backend.js'))!!}
@include('partials.sweet_alert')
@endsection
