@extends('layouts.profile')
@section('body')
<div class="panel-body">
	<div class="row">
		@forelse($user->books as $book)	
			<div class="col-xs-8 col-md-3">
				<a href="{{url("book/$book->url_slug")}}" class="thumbnail">
		        <img src="../uploads/covers/{{$book->cover}}" alt="here is book cover">
		        </a>
		        <h3>Title : {{$book->title}}</h3>
		        <h3>Authur: {{$book->authur}}</h3>
		        <p>Uploaded At : {{$book->updated_at}} </p>
		        <p>Uploaded by : {{$book->user->name}}</p>
		        @if(Auth::guest())
		        
		        @elseif ($user->id==Auth::user()->id)
		        <a class="btn btn-default"><i class=""></i>Edit</a>
		        <a class="btn btn-danger"><i class=""></i>Delete</a>
		        @endif
			</div>
		@empty
		@endforelse
	</div>
</div>
@endsection