@extends('layout')

@section('content')
	<div class="container top-margin">
		<table class="table table-striped">
	     	<thead>
	        	<tr>
		        	<th>ID</th>
		          	<th>Type</th>
		          	<th>Owner</th>
		          	<th>View</th>
	        	</tr>
	      	</thead>
	      	<tbody>
	        	@foreach($problems as $problem)
	        	<tr>
	        		<td>{{ $problem->id }}</td>
	        		<td>{{ $problem->type }}</td>
	        		<td>{{ $problem->username }}</td>
	        		<td><a href="/problem/{{ $problem->id }}">View</a></td>
	        	</tr>
	        	@endforeach
	      	</tbody>
    	</table>
	</div>
@stop