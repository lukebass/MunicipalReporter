@extends('layout')

@section('content')
	<div class="container top-margin">
		<a href="/problem/create" class="btn btn-primary align-right" role="button"><span class="glyphicon glyphicon-plus"></span> Problem</a>
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