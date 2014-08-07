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

		@if(Session::has('typeError'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">×</span>
				</button>
				<strong>Error:</strong> Type already in use.
			</div>
		@endif

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Add Problem</h3>
			</div>
			{{ Form::open(array('url' => 'problem')) }}
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('type', 'Type') }}
					{{ Form::text('type', null, array('class' => 'form-control', 'placeholder' => 'Type', 'required')) }}
				</div>
				<div class="form-group last-group">
					{{ Form::label('owner', 'Owner') }}
					{{ Form::email('owner', null, array('class' => 'form-control', 'placeholder' => 'Owner', 'required')) }}
				</div>
			</div>
			<div class="panel-footer">
				{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
@stop