@extends('backend/app')

@section('title','| All Categories')

@section('content')

	<div class = "row">
		<div class = "col-md-8">
		<h1>Categories</h1>
		<table class = "table table-hover">
			<thead>
				<tr>
					<th data-field="id">#</th>
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
						<a href="/backend/category/show" class="btn btn-primary">Edit</a>
						<a href="/backend/category/show" class="btn btn-primary">Delete</a>
						</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		</div>
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
