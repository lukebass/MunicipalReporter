<?php

class UserController extends BaseController {

	public function index()
	{
		if(Auth::user()->admin)
		{
			$users = User::all();
			return View::make('user/index')->with('users', $users);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function create()
	{
		if(Auth::user()->admin)
		{
			return View::make('user/create');
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function store()
	{
		$username = Input::get('username');
		$email = Input::get('email');
		$password = Input::get('password');
		$repassword = Input::get('repassword');
		
		if($password != $repassword)
		{
			return Redirect::to('/user/create')->with('passwordError', true);
		}

		$usernameCheck = User::where('username', '=', $username)->count();
		if($usernameCheck > 0)
		{
			return Redirect::to('/user/create')->with('usernameError', true);
		}

		$emailCheck = User::where('email', '=', $email)->count();
		if($emailCheck > 0)
		{
			return Redirect::to('/user/create')->with('emailError', true);
		}
		
		$user = new User;
		$user->username = $username;
		$user->email = $email;
		$user->password = Hash::make($password);
		$user->save();

		$content = array(
			'email' => (string) $email,
			'subject' => 'Municipal Reporter: New Account Created'
		);

		$data = array(
			'username' => $username
		);

		Mail::send('emails/welcome', $data, function($message) use ($content) {
        	$message->to($content['email'])->subject($content['subject']);
    	});

		return Redirect::to('/user/' . $user->id)->with('createSuccess', true);
	}

	public function show($id)
	{
		if(Auth::user()->id == $id || Auth::user()->admin)
		{
			$user = User::find($id);
			return View::make('user/show')->with('user', $user);
		}
		else
		{
			return Redirect::to('/');	
		}
	}

	public function edit($id)
	{
		if(Auth::user()->id == $id || Auth::user()->admin)
		{
			$user = User::find($id);
			return View::make('user/edit')->with('user', $user);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function update($id)
	{
		$user = User::find($id);
		$username = Input::get('username');
		$email = Input::get('email');
		$password = Input::get('password');
		$repassword = Input::get('repassword');
		
		if($password != null)
		{
			if($password != $repassword)
			{
				return Redirect::to('/user/' . $id . '/edit')->with('passwordError', true);
			}
			else
			{
				$user->password = Hash::make($password);
			}
		}

		if($user->username != $username)
		{	
			$usernameCheck = User::where('username', '=', $username)->count();
			if($usernameCheck > 0)
			{
				return Redirect::to('/user/' . $id . '/edit')->with('usernameError', true);
			}
			else
			{
				$user->username = $username;
			}
		}

		if($user->email != $email)
		{
			$emailCheck = User::where('email', '=', $email)->count();
			if($emailCheck > 0)
			{
				return Redirect::to('/user/' . $id . '/edit')->with('emailError', true);
			}
			else 
			{
				$user->email = $email;
			}
		}
		
		$user->save();

		return Redirect::to('/user/' . $id)->with('updateSuccess', true);
	}

	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		return Redirect::to('/user');
	}
	
}