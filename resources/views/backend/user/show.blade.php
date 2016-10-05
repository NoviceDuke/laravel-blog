@extends('backend/app')
@section('content')
    <div class="well well-lg">
        <div class="panel panel-info">
            <div class="panel-heading">{{$user->name}} - 詳細資料</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                    <div class="thumbnail">
                      <img src="{{$user->picture}}">
                      <div class="row">
                          <div class="caption center-block" style="text-align:center;">
                              <h2>{{$user->name}}</h2>
                          </div>
                      </div>
                      </div>
                    </div>
                  <div class="col-md-8">
                    <h2>關於我</h2>
                    <section>{{$user->about_me}}</section>
                  </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div>
                            Email : {{$user->email}}
                        </div>
                        <div>
                            Links :
                        </div>
                        <div>
                            Roles :
                            @foreach ($user->roles as $role)
                                {{$role->display_name}}
                            @endforeach
                        </div>
                        <div>
                            Permissions :
                            @foreach ($user->permissions as $permission)
                                <span style="margin-right:15px;">v-{{$permission->display_name}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">{{$user->name}} - 文章列表</div>
            <div class="panel-body">
                <table class="table table-hover table-striped">
        	        <thead>
        	          <tr>
        	              <th>ID</th>
        	              <th>title</th>
        	              <th>slug</th>
        	              <th>created_at</th>
        	              <th>updated_at</th>
        	              <th style="max-width:10px;"></th>
        	          </tr>
        	        </thead>
        	        <tbody>
                    @foreach ($user->articles as $article)
        	        <tr>
        	            <td>{{$article->id}}</td>
        	            <td>{{$article->title}}</td>
        	            <td>{{$article->slug}}</td>
        	            <td>{{$article->created_at}}</td>
        	            <td>{{$article->updated_at}}</td>
        	            <td style="text-align:right;">
                            <a class="btn btn-info" href="{{route('backend.article.show', $article->id)}}">檢視</a>
                        </td>
        	        </tr>
                    @endforeach
        	        </tbody>
        	    </table>
            </div>
        </div>
    </div>
@endsection
