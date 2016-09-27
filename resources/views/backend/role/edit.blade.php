@extends('backend/app')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        @if($role->name == 'SuperRoot')
            <div class="form-group">
                <span>超級使用者不必操控任何權限</span>
            </div>
        @else
            {!! Form::open(['url' => route('backend.role.update', $role->id), 'method' => 'PATCH']) !!}
            <h4>Edit User's Roles</h4>
            <div class="form-group">
                @foreach ($permissions as $index => $permission)
                    {!! Form::checkbox("permission[$index]", $permission->id, $role->hasPermission($permission->name)); !!}
                    {!! Form::label($permission->name, $permission->display_name) !!}
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
