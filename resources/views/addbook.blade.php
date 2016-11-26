@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Book</div>

                <div class="panel-body">
					@if (count($errors) > 0)
			            @foreach ($errors->all() as $error)
				            <div class="alert alert-danger">
				                {{ $error }}
			                </div>
			            @endforeach
					@endif
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="/addbook">
                    {{ csrf_field() }}
                    <div class="form-group">
					    <label for="" class="col-sm-2 control-label">Title</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="title" placeholder="Title">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="" class="col-sm-2 control-label">Authur</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="authur" placeholder="Book Authur">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="" class="col-sm-2 control-label">Edition</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="edition" placeholder="Book Edition">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="" class="col-sm-2 control-label">Number</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="number" placeholder="Book Number">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="BookCoverFile" class="col-sm-2 control-label">Cover</label>
					    <div class="col-sm-10">
					    <input type="file" name="cover">
					    <p class="help-block">Only jpg.</p>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="bookFile" class="col-sm-2 control-label">Book</label>
					    <div class="col-sm-10">
					    <input type="file" name="bookFile">
					    <p class="help-block">Only pdfs.</p>
					    </div>
					  </div>
					   <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    <input type="hidden" name="userid" value="{{ Auth::user()->id }}">

					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					      <button type="submit" name="save" class="btn btn-primary">Add Book</button>

					    </div>
					  </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection