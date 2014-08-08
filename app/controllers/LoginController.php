<?php

class LoginController extends BaseController {

	public function postIndex()
	{
		$user = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($user))
		{
			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('/login')->with('errors', true);
		}
	}

}
