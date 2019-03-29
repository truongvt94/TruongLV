@extends('Admin.Home')
@section('content')
<h1 class="text-center">Thêm User</h1><br>
<form class="frm-add" method="post" enctype="multipart/form-data" action="{{route('postCreat')}}">

  @if(Session::has('success'))
  <div class="alert alert-success">
      {{Session::get('success')}}
  </div>
  @endif
  @include('eror.eror')
  <div class="form-group">
    <input type="text" class="form-control" id="usr" name="name" placeholder="Enter name...">
  </div>     
  <div class="form-group">
    <input type="text" class="form-control" id="usr" name="phone_number" placeholder="Enter phone...">
  </div>
{{--   <div class="form-group">
    <input type="text" class="form-control" id="usr" name="year_month_date" placeholder="Enter year/month/date...">
  </div> --}}
  <div class="form-group">
    <input type="email" class="form-control" id="usr" name="email" placeholder="Enter email...">
  </div>
  <div class="form-group">
  <input type="email" class="form-control" id="usr" name="email_verified_at" placeholder="Enter confirm email...">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password...">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="pwd" name="password_verified_at" placeholder="Enter confirm password...">
  </div>
  <input type="text" id="datepicker" name="year" placeholder="Year/ Month/ Day">
  <div class="form-group">
    <select name="type" class="form-control" id="sel1">
      <option>--Phân Quyền Người Dùng--</option>
      <option value="super">Super Admin</option>
      <option value="admin">Admin</option>
      <option value="hr">Hr</option>
      <option value="member">Member</option>
    </select>
  </div>
  <input type="file" class="fl_avatar form-control-file border" name="avatar">
  <div class="form-group text-center">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Add User</button>
  </div>
</form>
@endsection