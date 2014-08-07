<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		$problems = Problem::lists('type', 'type');
		return View::make('home/index')->with('problems', $problems);
	}

	public function postIndex()
	{
		$type = Input::get('type');
		$lat = Input::get('lat');
		$lng = Input::get('lng');
		$name = Input::get('name');
		$email = Input::get('email');
		$comments = Input::get('comments');
		
		$marker = new Marker;
		$marker->type = $type;
		$marker->lat = $lat;
		$marker->lng = $lng;
		$marker->name = $name;
		$marker->email = $email;
		$marker->comments = $comments;
		$marker->save();

		return Redirect::to('/')->with('success', true);
	}

}
