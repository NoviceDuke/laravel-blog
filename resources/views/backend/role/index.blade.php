@extends('backend/app')
@section('content')
    <div class="panel panel-default">
    	<div class="panel-heading">Role</div>
    	<div class="panel-body">
    		<p>Manage all Roles.</p>
    	</div>
    	<div class="table-responsive">
    		<table class="table table-hover table-striped">
    	        <thead>
    	          <tr>
    	              <th>ID</th>
    	              <th>name</th>
    	              <th>display_name</th>
    	              <th>created_at</th>
    	              <th>updated_at</th>
    	              <th style="max-width:10px;"></th>
    	          </tr>
    	        </thead>
    	        <tbody>
    	        @foreach($roles as $role)
    	          <tr>
    	            <td>{{$role->id}}</td>
    	            <td>{{$role->name}}</td>
    	            <td>{{$role->display_name}}</td>
    	            <td>{{$role->created_at}}</td>
    	            <td>{{$role->updated_at}}</td>
    	            <td style="text-align:right;">
                        <a class="btn btn-primary" href="{{route('backend.role.edit', $role->id)}}">編輯</a>
                        <a class="btn btn-danger" href="{{route('backend.role.destroy', $role->id)}}" data-method="delete" data-confirm="確定刪除嗎? 作者的文章將會一併刪除" data-token="{{csrf_token()}}">刪除</a>
                    </td>
    	          </tr>
    	        @endforeach
    	        </tbody>
    	    </table>
    	</div>
    </div>
{!! Html::script(asset('js/hchs_backend.js'))!!}
@include('partials.sweet_alert')
@endsection
