<?php

class ListController extends BaseController {

	public function getIndex()
	{
		$markers = DB::table('problems')->join('markers', 'problems.type', '=', 'markers.type')
									   	->orderBy('markers.created_at', 'asc')
									   	->get();
		return View::make('list/index')->with('markers', $markers);
	}
	
}
