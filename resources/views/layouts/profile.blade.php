@extends('layouts.app')
@section('content')

<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
		@if (Auth::guest())
		{{$user->name}}'s Profile
		@elseif (Auth::user()->id==$user->id)
			Profile
		@else
			{{$user->name}}'s Profile
		@endif
		<a href="/profile/{{$user->id}}" class="btn btn-link pull-right">Books</a>
		<a href="/profile/{{$user->id}}/follower" class="btn btn-link pull-right">Follower</a>
		<a href="/profile/{{$user->id}}/following" class="btn btn-link pull-right">Following</a>
		@if (Auth::guest())
		@elseif(Auth::user()->id==$user->id)
		@else
		@if(DB::table('user_user')->where([['follower_id','=',Auth::user()->id],['following_id', '=', $user->id],])->count()==0)
		<form method="POST" action="/follow" class="pull-right">
			{{csrf_field()}}
			<input type="hidden" name="follower_id" value="{{Auth::user()->id}}">
			<input type="hidden" name="following_id" value="{{$user->id}}">
			<input type="submit" name="follow" class="btn btn-sm btn-primary" value="Follow">
		</form>
		@else
			<form method="POST" action="/unfollow" class="pull-right">
			{{csrf_field()}}
			<input type="hidden" name="follower_id" value="{{Auth::user()->id}}">
			<input type="hidden" name="following_id" value="{{$user->id}}">
			<input type="submit" name="unfollow" class="btn btn-sm btn-default pull-right" value="unFollow">
		</form>
		@endif
		@endif
	</div>
    @yield('body')
</div>
</div>
@endsection