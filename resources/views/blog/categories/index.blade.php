@extends('blog/app')

@section('title','| All Categories')

@section('content')

	<div class = row>
		<div class = "col-md-8">
		<h1>Categories</h1>
		<table class = "table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
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
	</div>		
@endsection