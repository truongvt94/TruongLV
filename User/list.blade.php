@extends('Admin.Home')
@section('content')
<h1 class="daylah1 text-center">Danh Sách User</h1>
<a href="{!!route('getCreat')!!}"><button class="btn btn-primary">Add Users</button></a>
@if(Session::has('success'))
<div class="alert alert-success">
	{{Session::get('success')}}
</div>
@endif
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Phone Number</th>
			<th scope="col">User Type</th>
			<th scope="col">Avatar</th>
			<th scope="col">Manipulation</th>
		</tr>
	</thead>
	<tbody>
		@foreach($show as $key)
		<tr>
			<th scope="row">{{$key->id}}</th>
			<td>{{$key->name}}</td>
			<td>{{$key->email}}</td>
			<td>{{$key->phone_number}}</td>
			<td>{{$key->type}}</td>
			<td>{{$key->avatar}}</td>
			<td class="text-center"><a href="{!!route('getUpdate',$key->id)!!}" ><i class="fas fa-edit"></i></a>
				<a onclick="return ConfirmDelete('Delete Y/N')" href="{!!route('delete',$key->id)!!}"><i class="far fa-trash-alt"></i></button></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row d-flex justify-content-center">
		{{$show->links()}}
	</div>
	@endsection