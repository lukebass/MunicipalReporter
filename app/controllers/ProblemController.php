<?php

class ProblemController extends BaseController {

	public function index()
	{
		if(Auth::user()->admin)
		{
			$problems = Problem::all();
			return View::make('problem/index')->with('problems', $problems);
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
			$users = User::lists('username', 'username');
			return View::make('problem/create')->with('users', $users);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function store()
	{
		$type = Input::get('type');
		$username = Input::get('username');

		$typeCheck = Problem::where('type', '=', $type)->count();
		if($typeCheck > 0)
		{
			return Redirect::to('/problem/create')->with('typeError', true);
		}
		
		$problem = new Problem;
		$problem->type = $type;
		$problem->username = $username;
		$problem->save();

		return Redirect::to('/problem/' . $problem->id)->with('createSuccess', true);
	}

	public function show($id)
	{
		if(Auth::user()->admin)
		{
			$problem = Problem::find($id);
			return View::make('problem/show')->with('problem', $problem);
		}
		else
		{
			return Redirect::to('/');	
		}
	}

	public function edit($id)
	{
		if(Auth::user()->admin)
		{
			$problem = Problem::find($id);
			$users = User::lists('username', 'username');
			$owner = $problem->username;
			return View::make('problem/edit')->with('problem', $problem)
											 ->with('users', $users)
											 ->with('owner', $owner);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function update($id)
	{
		$problem = Problem::find($id);
		$type = Input::get('type');
		$username = Input::get('username');

		if($problem->type != $type)
		{
			$typeCheck = Problem::where('type', '=', $type)->count();
			if($typeCheck > 0)
			{
				return Redirect::to('/problem/' . $id . '/edit')->with('typeError', true);
			}
			else 
			{
				$problem->type = $type;
			}
		}
		
		$problem->username = $username;
		$problem->save();

		return Redirect::to('/problem/' . $id)->with('updateSuccess', true);
	}

	public function destroy($id)
	{
		$problem = Problem::find($id);
		$problem->delete();
		return Redirect::to('/problem');
	}
	
}