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

	<div class="container-fluid full-fluid">
		<div id="map"/>
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
		<div class="alert alert-info alert-home">
			<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span>
			</button>
			<strong>Notification:</strong> To save click the button below.
		</div>
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        		<h4 class="modal-title" id="myModalLabel">Report a Problem</h4>
	      		</div>
	      		{{ Form::open() }}
	      		<div class="modal-body">
					<div class="form-group">
						{{ Form::label('type', 'Type of Problem') }}
						{{ Form::select('type', array('Animal Control' => 'Animal Control', 'Graffiti' => 'Graffiti', 'Litter' => 'Litter', 'Parking' => 'Parking', 'Road Conditions' => 'Road Conditions', 'Sidewalk Conditions' => 'Sidewalk Conditions', 'Street Lights' => 'Street Lights', 'Street Signs' => 'Street Signs', 'Traffic Signals' => 'Traffic Signals', 'Unsightly Property' => 'Unsightly Property', 'Waste Collection' => 'Waste Collection', 'Water Quality' => 'Water Quality'), null, array('class' => 'form-control')) }}
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
		<button class="btn btn-danger" onclick="getLoc()" data-toggle="modal" data-target="#myModal">Save Position</a>
	</div>

	<div class="loc-btn">
		<button class="btn btn-primary" onclick="currentLoc()">Current Location</a>
	</div>

	{{ HTML::script('js/main.js') }}
@stop