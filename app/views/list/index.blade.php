@extends('layout')

@section('content')
	<div class="container top-margin">
		<table class="table table-striped">
	     	<thead>
	        	<tr>
		        	<th>ID</th>
		          	<th>Problem</th>
		          	<th>Name</th>
		          	<th>Email</th>
		          	<th>View</th>
	        	</tr>
	      	</thead>
	      	<tbody>
	        	@foreach($markers as $marker)
	        	<tr>
	        		<td>{{ $marker->id }}</td>
	        		<td>{{ $marker->problem }}</td>
	        		<td>{{ $marker->name }}</td>
	        		<td>{{ $marker->email }}</td>
	        		<td><a href="/marker/{{ $marker->id }}">View</a></td>
	        	</tr>
	        	@endforeach
	      	</tbody>
    	</table>
	</div>
@stop