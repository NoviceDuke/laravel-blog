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
            <td>{{substr($article->content, 0,50)}}{{strlen($article->content)>50?"..." : ""}}
            </td>
            <td>{{$article->create_at}}</td>
            <td>
            <a href="#" class="waves-effect waves-light btn red">Edit</a>
            <a href="#" class="waves-effect waves-light btn">
            Delete	
            </a></td>
          </tr>
        @endforeach  
        </tbody>
      </table>
@endsection