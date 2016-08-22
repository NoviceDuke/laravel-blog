@extends('blog/app')

@section('title','| All Categories')

@section('content')

	<div class = row>
		<div class = "col-md-8">
		<h1>Categories</h1>
		<table class = "highlight bordered table">
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
					<th>{{ $category->name }}</th>
				</tr>
			@endforeach
			</tbody>
		</table>
		</div>
		<div class = "col-md-3">
			<div class = "well">
				{!! Form::open(['route'=>'categories.store','method'=>'POST'])!!}
				<h2>Add New Category</h2>
				{{Form::label('name','Name:')}}
				{{Form::text('name',null,['class'=>'form-control'])}}
				{{Form::submit('Create New Category',['class'=>'btn btn-primary btn block btn-h1-spacing'])}}
				{!!Form::close()!!}

			</div>

		</div>
	</div>
@endsection