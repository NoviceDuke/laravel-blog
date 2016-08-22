@extends('blog/app')

@section('title','| All Articles')

@section('content')

	<table>
        <thead>
          <tr>
              <th data-field="id">ID</th>
              <th data-field="name">Article</th>
              <th data-field="time">Date</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
        @foreach($articles as $article)
          <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->create_at}}</td>
            <td>
            <a href="#" class="waves-effect waves-light btn">Edit</a>
            <a href="#" class="waves-effect waves-light btn">
            Delete	
            </a></td>
          </tr>
        @endforeach  
        </tbody>
      </table>
@endsection