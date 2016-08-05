@extends('blog/app')
@section('content')
<div class="row">
    <!--Static Cut Left Panel 75%-->
    <div class="col s12 m9">
        @include('blog.leftSide')
    </div>
    <!--Static Cut Left Panel 75%-->
    <!--Static Cut Right Panel 25%-->
    <div class="col s12 m3">
        @include('blog.rightSide')
    </div>
    <!--Static Cut Right Panel 25%-->
</div>
@endsection
