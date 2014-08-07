@extends('layout')

@section('content')
	<div class="container-fluid max-width-sm">

		@if(Session::has('errors'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">×</span>
				</button>
				<strong>Error:</strong> Username or password is incorrect.
			</div>
		@endif

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Login</h3>
			</div>
			{{ Form::open() }}
			<div class="panel-body">
				<div class="form-group">
					{{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username', 'required')) }}
				</div>
				<div class="form-group last-group">
					{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required')) }}
				</div>
	    	</div>
	    	<div class="panel-footer">
				{{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
			</div>
	    	{{ Form::close() }}
		</div>
	</div>
@stop