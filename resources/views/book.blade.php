@extends('layouts.app')
@section('content')
<div class="container">
  <div class="well">
    <div class="row">
      <div class="col-md-4">
        <a href="#" class="thumbnail">
        <img src="../uploads/covers/{{$book->cover}}" alt="here is book cover">
        </a>
          </div>
      <div class="col-md-8">
        <h1>{{$book->title}}</h1>
        <h3>Authur: {{$book->authur}}</h3>
      <p>Uploaded At : {{$book->updated_at}} </p>
      <p>Uploaded by : <a href="/profile/{{$book->user->id}}" class="btn btn-link" >{{$book->user->name}}</a></p>
      
      @if(Auth::guest())
        <p>Login to Download</p>
      @else
        <a href="{{url("/book/download/$book->url_slug")}}" class="btn btn-link">Download</a>
      @endif
      </div>
    </div>
  </div>
</div>
@endsection