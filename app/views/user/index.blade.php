@extends('layout')

@section('content')
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
		    <div class="navbar-header">
		    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" href="/">City of Prince Rupert</a>
		    </div>
		    <div class="collapse navbar-collapse" id="navbar-collapse">
		    @if(Auth::user())
		    	<ul class="nav navbar-nav">
		    		<li><a href="/map">Map</a></li>
		    		<li><a href="/list">List</a></li>
		    		<li><a href="/user/{{ Auth::user()->id }}">Account</a></li>
		    		@if(Auth::user()->admin)
		    		<li class="dropdown">
			           	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <span class="caret"></span></a>
			            <ul class="dropdown-menu" role="menu">
			              	<li><a href="/problem">Problems</a></li>
			               	<li class="divider"></li>
			    			<li><a href="/user">Users</a></li>
			            </ul>
            		</li>
		    		@endif
		    	</ul>
		    	<a href="/logout" class="btn btn-primary navbar-btn navbar-right" role="button">Logout</a>
		    @else
		    	<a href="/login" class="btn btn-primary navbar-btn navbar-right" role="button">Login</a>
		    @endif
			</div>
      	</div>
	</div>

	<div class="container top-margin">
		<a href="/user/create" class="btn btn-primary align-right" role="button">+ User</a>
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