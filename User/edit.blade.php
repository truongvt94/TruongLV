@extends('Admin.Home')
@section('content')
<h1 class="text-center">Thêm User</h1><br>
<form class="frm-add" method="post" enctype="multipart/form-data" action="{{route('postUpdate',$user->id)}}">

	@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
	@endif
	@include('eror.eror')
	<div class="form-group">
		<input type="text" class="form-control" id="usr" name="name" value="{{$user->name}}" placeholder="Enter name...">
	</div>     
	<div class="form-group">
		<input type="text" class="form-control" id="usr" name="phone_number" value="{{$user->phone_number}}" placeholder="Enter phone...">
	</div>
	<div class="form-group">
		<input type="text" class="form-control" id="usr" name="year" value="{{$user->year}}" placeholder="Enter year/month/date...">
	</div>
	<div class="form-group">
		<input type="email" class="form-control" id="usr" name="email" value="{{$user->email}}" placeholder="Enter email...">
	</div>
	<div class="form-group">
		<input type="email" class="form-control" id="usr" name="email_verified_at" value="{{$user->email_verified_at}}" placeholder="Enter email...">
	</div>
	<div class="form-group">
		<input type="password" class="form-control" id="pwd" name="password" value="" placeholder="Enter password...">
	</div>
	<div class="form-group">
		<input type="password" class="form-control" id="pwd" name="password_verified_at" value="" placeholder="Enter Repeat password...">
	</div>
	<div class="form-group">
		<select name="type" class="form-control" id="sel1">
			<option @if($user->type == 'super') selected @endif value="super">Super</option>
			<option @if($user->type == 'admin') selected @endif value="admin">admin</option>
			<option @if($user->type == 'hr') selected @endif value="hr">hr</option>
			<option @if($user->type == 'member') selected @endif value="member">Member</option>
		</select>
	</div>
	<div class="form-group">
		<img src="{{ asset('public/images/'.$user->avatar) }}" style="width: 200px; height: auto;" >
	</div>
	<input type="hidden" name="old_images" value="{{$user->avatar}}">
	<input type="file" class="fl_avatar form-control-file border" name="avatar"/>
	<div class="form-group text-center">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<button type="submit" class="btn btn-primary">Edit User</button>
	</div>
</form>

@endsection