<?php

class LogoutController extends BaseController {

	public function getIndex()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}