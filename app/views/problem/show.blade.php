@extends('layout')

@section('content')
	<div class="container top-margin max-width-lg">

		@if(Session::has('createSuccess'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">×</span>
				</button>
				<strong>Success:</strong> Problem type has been created.
			</div>
		@endif

		@if(Session::has('updateSuccess'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">×</span>
				</button>
				<strong>Success:</strong> Problem type has been updated.
			</div>
		@endif

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>{{ $problem->type }}</h3>
			</div>
			{{ Form::open(array('method' => 'delete')) }}
			<div class="panel-body">
				<p class="margin-lg"><strong>ID:</strong> {{ $problem->id }}</p>
				<p class="last-group"><strong>Owner:</strong> {{ $problem->username }}</p>
			</div>
			<div class="panel-footer">
				<a href="/problem/{{ $problem->id }}/edit" class="btn btn-primary" role="button">Edit</a>
				@if(Auth::user()->admin)
					{{ Form::submit('Delete', array('class' => 'btn btn-danger align-right')) }}
				@endif
			</div>
			{{ Form::close() }}
		</div>
	</div>
@stop