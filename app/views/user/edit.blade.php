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
				<h3>{{ $user->username }}</h3>
			</div>
			{{ Form::open(array('url' => 'user/' . $user->id, 'method' => 'put')) }}
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('username', 'Username') }}
					{{ Form::text('username', $user->username, array('class' => 'form-control', 'required')) }}
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email') }}
					{{ Form::email('email', $user->email, array('class' => 'form-control', 'required')) }}
				</div>
				<div class="form-group">
					{{ Form::label('password', 'Password') }}
					{{ Form::password('password', array('class' => 'form-control')) }}
				</div>
				<div class="form-group last-group">
					{{ Form::label('repassword', 'Re-enter Password') }}
					{{ Form::password('repassword', array('class' => 'form-control')) }}
				</div>
			</div>
			<div class="panel-footer">
				{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
@stop