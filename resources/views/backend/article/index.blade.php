@extends('backend/app')

@section('title','| All Articles')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Aricle</div>
	<div class="panel-body">
		<p>Manage all articles.</p>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-striped">
	        <thead>
	          <tr>
	              <th>ID </th>
	              <th>Article</th>
								<th>Category</th>
								<th>Body</th>
								<th>Author</th>
	              <th>Date</th>
				  <th></th>
				  <th></th>
	          </tr>
	        </thead>

	        <tbody>
	        @foreach($articles as $article)
	          <tr>
	            <td>{{$article->id}}</td>
	            <td>{{$article->title}}</td>
							<td>{{$article->category->name}}	</td>
	            <td>{{substr($article->content, 0,50)}}{{strlen($article->content)>50?"..." :""}}</td>
							<td>{{$article->user_id}}</td>
	            <td>{{$article->created_at}}</td>
	            <td><a href="/backend/article/{{$article->id}}" class="btn btn-info">Show</a></td>
							<td>
					{!! Form::open(['method' => 'DELETE','route' => ['backend.article.destroy', $article->id]]) !!}
				    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
				    {!! Form::close() !!}
	            </td>
	          </tr>
	        @endforeach
	        </tbody>
	    </table>
		<div class="text-center">
			{!! $articles->links();!!}
		</div>
	</div>
</div>
@endsection
