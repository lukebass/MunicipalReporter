<?php

class AssignedController extends BaseController {

	public function getIndex()
	{
		$markers = DB::table('problems')->join('markers', 'problems.type', '=', 'markers.type')
									   	->where('problems.username', '=', Auth::user()->username)
									   	->orderBy('markers.created_at', 'asc')
									   	->get();
		return View::make('assigned/index')->with('markers', $markers);
	}

}
