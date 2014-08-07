@extends('layout')

@section('content')
	<div class="container top-margin max-width-lg">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>{{ $marker->problem }}</h3>
			</div>
			{{ Form::open(array('method' => 'delete')) }}
			<div class="panel-body">
				<p class="margin-lg"><strong>ID:</strong> {{ $marker->id }}</p>
				<p class="margin-lg"><strong>Name:</strong> {{ $marker->name }}</p>
				<p class="margin-lg"><strong>Email:</strong> {{ $marker->email }}</p>
				<p class="last-group"><strong>Comments:</strong> {{ $marker->comments }}</p>
			</div>
			<div class="panel-footer">
				{{ Form::submit('Resolved', array('class' => 'btn btn-danger')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
@stop