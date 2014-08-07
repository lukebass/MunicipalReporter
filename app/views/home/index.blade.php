@extends('layout')

@section('content')
	<div class="container-fluid full-fluid">
		<div id="map"></div>
	</div>

	@if(Session::has('success'))
	<div class="container container-success">
		<div class="alert alert-success alert-home">
			<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span>
			</button>
			<strong>Success:</strong> Your report has been submitted.
		</div>
	</div>
	@endif

	<div class="container container-info">
		<div class="alert alert-warning alert-home">
			<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span>
			</button>
			<strong>Notification:</strong> To save click the button below.
		</div>
	</div>

	<div class="modal fade" id="markerModal" tabindex="-1" role="dialog" aria-labelledby="markerModal" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        		<h4 class="modal-title" id="markerModal">Report a Problem</h4>
	      		</div>
	      		{{ Form::open() }}
	      		<div class="modal-body">
					<div class="form-group">
						{{ Form::label('type', 'Type of Problem') }}
						{{ Form::select('type', $problems, null, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('name', 'Full Name') }}
						{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Full Name', 'required')) }}
					</div>
					<div class="form-group">
						{{ Form::label('email', 'Email') }}
						{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email Address', 'required')) }}
					</div>
					<div class="form-group last-group">
						{{ Form::label('comments', 'Additional Comments') }}
						{{ Form::textarea('comments', null, array('class' => 'form-control', 'placeholder' => 'Additional Comments', 'rows' => '5', 'required')) }}
					</div>
		      	</div>
			    <div class="modal-footer">
			    	{{ Form::hidden('lat', null, array('class' => 'lat-input')) }}
			    	{{ Form::hidden('lng', null, array('class' => 'lng-input')) }}
			    	{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			    </div>
	      		{{ Form::close() }}
	    	</div>
	  	</div>
	</div>

	<div class="save-btn">
		<button class="btn btn-danger" onclick="getLoc()" data-toggle="modal" data-target="#markerModal">Save Position</button>
	</div>

	<div class="loc-btn">
		<button class="btn btn-primary" onclick="currentLoc()">Current Location</button>
	</div>

	{{ HTML::script('js/main.js') }}
@stop