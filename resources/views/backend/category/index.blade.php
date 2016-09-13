@extends('backend/app')

@section('title','| All Categories')

@section('content')

	<div class = "row">
		<div class = "col-md-8">
			<body>

		<div class="container">
		  <h2>Category</h2>
		  <ul class="nav nav-tabs">
		    @foreach($categories as $category)


		    <li><a data-toggle="tab" href="{{ $category->id }}" >{{ $category->name }}</a></li>

				@endforeach
		  </ul>

		  <div class="tab-content">
				  @foreach($categories as $category)
						<div id="{{ $category->id }}" class="tab-pane fade in active">
				      <h3>HOME</h3>
				      <p>{{ $category->id }}</p>
				    </div>
						@endforeach


		  </div>
		</div>

		</body>
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
