@extends('layout')

@section('content')
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
				<h3>{{ $problem->type }}</h3>
			</div>
			{{ Form::open(array('url' => 'problem/' . $problem->id, 'method' => 'put')) }}
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('type', 'Type') }}
					{{ Form::text('type', $problem->type, array('class' => 'form-control', 'required')) }}
				</div>
				<div class="form-group last-group">
					{{ Form::label('owner', 'Owner') }}
					{{ Form::select('username', $users, $owner, array('class' => 'form-control')) }}
				</div>
			</div>
			<div class="panel-footer">
				{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
@stop