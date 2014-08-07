@extends('layout')

@section('content')
	<div class="container top-margin">
		<table class="table table-striped">
	     	<thead>
	        	<tr>
		        	<th>ID</th>
		          	<th>Username</th>
		          	<th>Email</th>
		          	<th>View</th>
	        	</tr>
	      	</thead>
	      	<tbody>
	        	@foreach($users as $user)
	        	<tr>
	        		<td>{{ $user->id }}</td>
	        		<td>{{ $user->username }}</td>
	        		<td>{{ $user->email }}</td>
	        		<td><a href="/user/{{ $user->id }}">View</a></td>
	        	</tr>
	        	@endforeach
	      	</tbody>
    	</table>
	</div>
@stop