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

		$problem = Problem::where('type', '=', $type)->first();
		$user = User::where('username', '=', $problem->username)->first();

		$content = array(
			'email' => (string) $user->email,
			'subject' => 'Municipal Reporter: New Problem Reported'
		);

		$data = array(
			'type' => $type,
			'name' => $name,
			'email' => $email,
			'comments' => $comments,
			'id' => $marker->id
		);

		Mail::send('emails/report', $data, function($message) use ($content) {
        	$message->to($content['email'])->subject($content['subject']);
    	});

		return Redirect::to('/');
	}

}
