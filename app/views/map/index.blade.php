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
		    		<li class="active"><a href="/map">Map</a></li>
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

	{{ HTML::script('js/map.js') }}
@stop