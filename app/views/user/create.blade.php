@extends('layout')

@section('content')
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