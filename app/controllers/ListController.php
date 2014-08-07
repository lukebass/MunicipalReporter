<?php

class ListController extends BaseController {

	public function getIndex()
	{
		$markers = Marker::all();
		return View::make('list/index')->with('markers', $markers);
	}
	
}
