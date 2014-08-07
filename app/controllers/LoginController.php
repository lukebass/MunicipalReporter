<?php

class LoginController extends BaseController {

	public function getIndex()
	{
		if(Auth::check())
		{
			return Redirect::to('/map');
		}
		else
		{
			return View::make('login/index');
		}
	}

	public function postIndex()
	{
		$user = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($user))
		{
			return Redirect::to('/map');
		}
		else
		{
			return Redirect::to('/login')->with('errors', true);
		}
	}

}
