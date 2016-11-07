@extends('backend/app')

@section('title','| All Categories')

@section('content')
	<meta name="_token" content="{{ csrf_token() }}"/>
	<div class="panel panel-info">
		<div class="panel-heading">Category</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-8">
					<p>Manage all categories.</p>
					</div>
					<div class="col-md-4 text-right">
					<button id="btn-add" name="btn-add" class="btn btn-primary btn-lg">Add New Category</button>
					</div>
				</div>

		</div>


		<div class="table-responsive">
			{{ csrf_field() }}
			<table class = "table table-hover table-striped">
			<thead>
				<tr>
					<th data-field="id">ID</th>
          <th data-field="name">Name</th>
					<th data-field="slug">Slug</th>
					<th data-field="time">Time</th>
					<th>Action</th>

				</tr>
			</thead>
			<tbody id="category-list" name="category-list">
			@foreach($categories as $category)
				<tr id="category{{$category->slug}}">
					<tr>
					<td>{{ $category->id }}</td>
					<td><a href="/backend/category/{{ $category->slug }}">{{ $category->name }}</a></td>
					<th>{{ $category->slug }}</th>
					<td>{{$category->created_at}}</td>
					<td>
						<button class="btn btn-info btn-md  edit-modal" value="{{$category->slug}}">Edit</button>
						<button class="btn btn-danger btn-md  delete-category" value="{{$category->slug}}">Delete</button>
					</td>
					</tr>
				</tr>
			@endforeach
			</tbody>
		</table>
		</div>
	</div>
	<!--modal -->

			<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Category Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmCategory" name="frmCategory" class="form-horizontal" novalidate="">

																<div class="form-group ">
                                    <label for="inputCategories" class="col-sm-3 control-label">Category</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="category_name" name="Name" placeholder="" value="">
                                    </div>
                                </div>
																{!! csrf_field() !!}
															</form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save</button>
                            <input type="hidden" id="category_slug" name="category_slug" value="0">
                        </div>
                    </div>
                </div>
            </div>
		<script src="{{asset('js/modal.js')}}"></script>
@endsection
