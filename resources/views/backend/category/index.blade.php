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
				</tr>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<th>{{ $category->id }}</th>
					<th><a href="/backend/category/show" class="btn btn-primary"></a>{{ $category->name }}</th>
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