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
                        <a class="btn btn-info right" href="#">檢視</a>
                        <a class="btn btn-primary right" href="#">編輯</a>
    	                <a class="btn btn-danger right" href="#">刪除</a>
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
@endsection
