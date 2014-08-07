@extends('layout')

@section('content')
	<div class="container top-margin max-width-lg">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>{{ $marker->type }}</h3>
			</div>
			{{ Form::open(array('method' => 'delete')) }}
			<div class="panel-body">
				<p class="margin-lg"><strong>ID:</strong> {{ $marker->id }}</p>
				<p class="margin-lg"><strong>Name:</strong> {{ $marker->name }}</p>
				<p class="margin-lg"><strong>Email:</strong> {{ $marker->email }}</p>	
				<p class="margin-lg"><strong>Comments:</strong> {{ $marker->comments }}</p>
				<p class="margin-lg"><strong>Assigned:</strong> {{ $assigned->username }}</p>
				<p class="margin-lg"><strong>Created:</strong> {{ $marker->created_at }}</p>
				<div id="mapette"></div>	
			</div>
			<div class="panel-footer">
				{{ Form::hidden('lat', $marker->lat, array('class' => 'lat-input')) }}
			    {{ Form::hidden('lng', $marker->lng, array('class' => 'lng-input')) }}
				{{ Form::submit('Resolved', array('class' => 'btn btn-danger')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>

	{{ HTML::script('js/marker.js') }}
@stop