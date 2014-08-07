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

	<div class="container top-margin max-width-lg">

		@if(Session::has('passwordError'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">×</span>
				</button>
				<strong>Error:</strong> Passwords do not match.
			</div>
		@endif

		@if(Session::has('usernameError'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">×</span>
				</button>
				<strong>Error:</strong> Username already in use.
			</div>
		@endif

		@if(Session::has('emailError'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">×</span>
				</button>
				<strong>Error:</strong> Email already in use.
			</div>
		@endif

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Add User</h3>
			</div>
			{{ Form::open(array('url' => 'user')) }}
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('username', 'Username') }}
					{{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username', 'required')) }}
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email') }}
					{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required')) }}
				</div>
				<div class="form-group">
					{{ Form::label('password', 'Password') }}
					{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required')) }}
				</div>
				<div class="form-group last-group">
					{{ Form::label('repassword', 'Re-enter Password') }}
					{{ Form::password('repassword', array('class' => 'form-control', 'placeholder' => 'Re-enter Password', 'required')) }}
				</div>
			</div>
			<div class="panel-footer">
				{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
@stop