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
			return View::make('problem/create');
		}
		else
		{
			return Redirect::to('/');
		}
	}
	
}