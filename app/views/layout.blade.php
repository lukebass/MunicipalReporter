<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>City of Prince Rupert</title>
		{{ HTML::style('css/bootstrap.css') }}
		{{ HTML::style('css/styles.css') }}
	</head>
	<body>
		{{ HTML::script('js/jquery.min.js') }}
		{{ HTML::script('js/bootstrap.js') }}
		{{ HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAwvBK0IEByg1QtaxYfBFk2fbDrvd2nCXU') }}
		
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
			    		<li><a href="/assigned">My Problems</a></li>
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
			    	<div class="btn-group navbar-btn navbar-right">
					  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->username }} <span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/user/{{ Auth::user()->id }}">My Account</a></li>
							<li class="divider"></li>
						    <li><a href="/logout">Logout</a></li>
						</ul>
					</div>
			    @else
			    	<button class="btn btn-primary navbar-btn navbar-right" onclick="getLoc()" data-toggle="modal" data-target="#loginModal">Login</button>
			    @endif
				</div>
	      	</div>
		</div>

		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
		  	<div class="modal-dialog max-width-sm">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		        		<h4 class="modal-title" id="loginModal">Login</h4>
		      		</div>
		      		{{ Form::open(array('url' => 'login')) }}
		      		<div class="modal-body">
						<div class="form-group">
							{{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username', 'required')) }}
						</div>
						<div class="form-group last-group">
							{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required')) }}
						</div>
			      	</div>
				    <div class="modal-footer">
				    	{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
				    </div>
		      		{{ Form::close() }}
		    	</div>
		  	</div>
		</div>

		@yield('content')
	</body>
</html>