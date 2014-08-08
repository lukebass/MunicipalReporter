@extends('layout')

@section('content')
	<div class="container top-margin">
		<table class="table table-striped">
	     	<thead>
	        	<tr>
		          	<th>Type</th>
		          	<th>Assigned</th>
		          	<th>Created</th>
		          	<th>View</th>
	        	</tr>
	      	</thead>
	      	<tbody>
	        	@foreach($markers as $marker)
	        	<tr>
	        		<td>{{ $marker->type }}</td>
	        		<td>{{ $marker->username }}</td>
	        		<td>{{ $marker->created_at }}</td>
	        		<td><a href="/marker/{{ $marker->id }}">View</a></td>
	        	</tr>
	        	@endforeach
	      	</tbody>
    	</table>
	</div>
@stop