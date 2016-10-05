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
					<button id="tag-add" name="tag-add" class="btn btn-primary btn-lg">Add New Tags</button>
			</div>

	</div>
	</div>
<div class="table-responsive" id="tag_table">
	{{ csrf_field() }}
	<table class = "table table-hover table-striped" >
		<thead>
			<tr>
				<th data-field="id">ID</th>
				<th data-field="name">Name</th>
				<th data-field="time">Time</th>
				<th>Action</th>

			</tr>
		</thead>
		<tbody id="tag_list" name="tag_list">
			@foreach($tags as $tag)
			<tr id="tag{{$tag->id}}">

				<tr>
					<td>{{ $tag->id }}</td>
					<td>{{ $tag->name }}</td>
					<td>{{ $tag->created_at }}</td>
					<td>
						<button class="btn btn-info btn-md  tag-edit" value="{{$tag->id}}">Edit</button>
						<button class="btn btn-danger btn-md  delete-tag" value="{{$tag->id}}">Delete</button>
					</td>

				</tr>
				</tr>
			@endforeach
		</tbody>
</table>
</div>
</div>
<!--modal -->

		<div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
									<div class="modal-content">
											<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
													<h4 class="modal-title" id="myModalLabel">Tag Editor</h4>
											</div>
											<div class="modal-body">
													<form id="frmTag" name="frmTag" class="form-horizontal" novalidate="">

															<div class="form-group ">
																	<label for="inputTags" class="col-sm-3 control-label">Tag</label>
																	<div class="col-sm-9">
																			<input type="text" class="form-control has-error" id="tag_name" name="Name" placeholder="" value="">
																	</div>
															</div>
															{!! csrf_field() !!}
														</form>
											</div>
											<div class="modal-footer">
													<button type="button" class="btn btn-primary" id="tag-save" value="add">Save</button>
													<input type="hidden" id="tag_id" name="tag_id" value="0">
											</div>
									</div>
							</div>
					</div>
	<meta name="_token" content="{{ csrf_token() }}"/>
	<script src="{{asset('js/modal.js')}}"></script>
@endsection
