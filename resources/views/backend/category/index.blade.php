@extends('backend/app')

@section('title','| All Categories')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Category</div>
		<div class="panel-body">
			<p>Manage all categories.</p>
		</div>


		<table class = "table table-hover table-striped">
			<thead>
				<tr>
					<th data-field="id">ID</th>
          <th data-field="name">Name</th>
					<th data-field="time">Time</th>

				</tr>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>
						{{$category->created_at}}
					</td>
					<td>
						{!! Html::linkRoute('backend.category.edit','Edit',array($category->id),array('class'=>'btn btn-info'))!!}
					</td>
					<td>
						{!! Form::open(['method' => 'DELETE','route' => ['backend.category.destroy', $category->slug]]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
						</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class = "col-md-3">
			<div class = "well">
				{!! Form::open(['route'=>'backend.category.store','method'=>'POST'])!!}
				<h2>Add New Category</h2>
				{{Form::label('name','Name:')}}
				{{Form::text('name',null,['class'=>'form-control'])}}
				{{Form::submit('Create New Category',['class'=>'btn btn-primary btn block btn-h1-spacing'])}}
				{!!Form::close()!!}
			</div>
		</div>
			</div>

@endsection
