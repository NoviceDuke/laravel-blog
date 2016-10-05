@extends('backend/app')
@section('content')
    <div class="well well-lg">
        <div class="panel panel-default">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                hello2
            </div>
        </div>
    </div>
@endsection
