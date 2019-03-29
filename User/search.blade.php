@extends('Admin.home')
@section('content')
<div class="alert alert-success">
	Keyword Search: {{$keyword}}<br>
	Amount record find: {{count($user)}}
</div>
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
		@foreach($user as $key)
		<tr>
			<th scope="row">{{$key->id}}</th>
			<td>{{$key->name}}</td>
			<td>{{$key->email}}</td>
			<td>{{$key->phone_number}}</td>
			<td>{{$key->type}}</td>
			<td>{{$key->avatar}}</td>
			<td class="text-center"><a href="{!!route('getUpdate',$key->id)!!}" ><i class="fas fa-edit"></i></a>
				<a onclick="return ConfirmDelete('Delete Y/N')" href="{!!route('delete',$key->id)!!}"><i class="far fa-trash-alt"></i></button></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="row d-flex justify-content-center">
	{{$user->links()}}
</div>
@endsection