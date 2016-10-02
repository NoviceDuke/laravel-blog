@extends('backend/app')
@section('title','| All Tags')

@section('content')

	<div class="panel panel-info">
	<div class="panel-heading">Tags</div>
	<div class="panel-body">
	<div class="row">
		<div class="col-md-8">
			All Tags
			</div>
			<div class="col-md-4 text-right">
					<button id="btn-add" name="btn-add" class="btn btn-primary btn-lg">Add New Tags</button>
			</div>

	</div>
	</div>
</div>
		{{ csrf_field() }}
	<table class = "table table-hover table-striped">
		<thead>
			<tr>
				<th data-field="id">ID</th>
				<th data-field="name">Name</th>
				<th data-field="time">Time</th>
				<th>Action</th>

			</tr>
		</thead>
		<tbody id="tag-list" name="tag-list">
			@foreach($tags as $tag)
			<tr id="tag{{$tag->id}}">

				<tr>
					<td>{{ $tag->id }}</td>
					<td>{{ $tag->name }}</td>
					<td>{{ $tag->created_at }}</td>
					<td>
						<button class="btn btn-info btn-md  edit-modal" value="{{$tag->id}}">Edit</button>
						<button class="btn btn-danger btn-md  delete-tag" value="{{$tag->id}}">Delete</button>
					</td>

				</tr>
				</tr>
			@endforeach

	</tbody>
</table>
@endsection
