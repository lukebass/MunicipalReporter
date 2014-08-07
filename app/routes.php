<?php

Route::group(array('before' => 'auth'), function()
{	
	Route::resource('problem', 'ProblemController');
	Route::resource('marker', 'MarkerController');
	Route::resource('user', 'UserController');
	Route::controller('assigned', 'AssignedController');
	Route::controller('list', 'ListController');
	Route::controller('map', 'MapController');
});

Route::controller('logout', 'LogoutController');
Route::controller('login', 'LoginController');
Route::controller('/', 'HomeController');