@extends('blog/app')

@section('title','| All Articles')

@section('content')

	<table>
        <thead>
          <tr>
              <th data-field="id">ID</th>
              <th data-field="name">Article</th>
              <th data-field="content">Body</th>
              <th data-field="time">Date</th>
          </tr>
        </thead>

        <tbody>
        @foreach($articles as $article)
          <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{substr($article->content, 0,50)}}{{strlen($article->content)>50?"..." :""}}
            </td>
            <td>{{$article->created_at}}</td>
            <td>
            <a href="/backend/article/{{$article->id}}" class="waves-effect waves-light btn red">Show</a>
            </td>
						<td>
							{!! Form::open([
            'method' => 'DELETE',
            'route' => ['backend.article.destroy', $article->id]
			        ]) !!}
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
@endsection
