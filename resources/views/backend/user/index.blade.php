@extends('backend/app')
@section('content')
    <div class="panel panel-default">
    	<div class="panel-heading">User</div>
    	<div class="panel-body">
    		<p>Manage all Users.</p>
    	</div>
    	<div class="table-responsive">
    		<table class="table table-hover table-striped">
    	        <thead>
    	          <tr>
    	              <th>ID</th>
    	              <th>name</th>
    	              <th>email</th>
    	              <th>created_at</th>
    	              <th>updated_at</th>
    	              <th style="max-width:10px;"></th>
    	          </tr>
    	        </thead>
    	        <tbody>
    	        @foreach($users as $user)
    	          <tr>
    	            <td>{{$user->id}}</td>
    	            <td>{{$user->name}}</td>
    	            <td>{{$user->email}}</td>
    	            <td>{{$user->created_at}}</td>
    	            <td>{{$user->updated_at}}</td>
    	            <td style="text-align:right;">
                        <a class="btn btn-primary" href="{{route('backend.user.edit', $user->id)}}">編輯</a>
                        <a class="btn btn-danger" href="{{route('backend.user.destroy', $user->id)}}" data-method="delete" data-confirm="確定刪除嗎? 作者的文章將會一併刪除" data-token="{{csrf_token()}}">刪除</a>
                    </td>
    	          </tr>
    	        @endforeach
    	        </tbody>
    	    </table>
    		<div class="text-center">
    			{!! $users->links();!!}
    		</div>
    	</div>
    </div>
{!! Html::script(asset('js/hchs_backend.js'))!!}
@include('partials.sweet_alert')
@endsection
