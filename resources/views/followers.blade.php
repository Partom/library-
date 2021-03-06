
@extends('layouts.profile')
@section('body')
<div class="panel-body">
	<ul class="list-group">
		@forelse($user->followers as $follower)
	        <li class="list-group-item">
	        @if(Auth::guest())
	        	<a href="/profile/{{$follower->id}}">{{$follower->name}}</a>
	        @elseif(Auth::user()->id==$follower->id)
	        	its you
        	@else
	        	<a href="/profile/{{$follower->id}}">{{$follower->name}}</a>
	   @if(DB::table('user_user')->where([['follower_id','=',Auth::user()->id],['following_id', '=', $follower->id],])->count()==0)
			<form method="POST" action="/follow" class="pull-right">
				{{csrf_field()}}
				<input type="hidden" name="follower_id" value="{{Auth::user()->id}}">
				<input type="hidden" name="following_id" value="{{$follower->id}}">
				<input type="submit" name="follow" class="btn btn-sm btn-primary" value="Follow">
			</form>
		@else
			<form method="POST" action="/unfollow" class="pull-right">
			{{csrf_field()}}
			<input type="hidden" name="follower_id" value="{{Auth::user()->id}}">
			<input type="hidden" name="following_id" value="{{$follower->id}}">
			<input type="submit" name="unfollow" class="btn btn-sm btn-default pull-right" value="unFollow">
		</form>
		@endif
	        @endif
			</li>
	    @empty
			<div class="alert alert-info">No Followings</div>
	    @endforelse
	    </ul>
	</div>
</div>
</div>
</div>
@endsection