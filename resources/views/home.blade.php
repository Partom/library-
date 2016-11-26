@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    @foreach ($books as $book)
      <div class="col-xs-8 col-md-4">
        <a href="{{url("book/$book->url_slug")}}" class="thumbnail">
          <img src="../uploads/covers/{{$book->cover}}" alt="here is book cover">
        </a>
        <h3>Title : {{$book->title}}</h3>
        <h3>Authur: {{$book->authur}}</h3>
        <p>Uploaded At : {{$book->updated_at}} </p>
        <p>Uploaded by : <a href="/profile/{{$book->user->id}}" class="btn btn-link" >{{$book->user->name}}</a></p>        
      </div>
    @endforeach 
  </div>
</div>
@endsection
