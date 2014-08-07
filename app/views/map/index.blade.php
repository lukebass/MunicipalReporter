@extends('layout')

@section('content')
	<div class="container-fluid full-fluid">
		<div id="map"></div>
	</div>

	{{ HTML::script('js/map.js') }}
@stop