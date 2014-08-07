<?php

class MarkerController extends BaseController {

	public function index()
	{
		$markers = Marker::all();
		return Response::json($markers);
	}

	public function show($id)
	{
		$marker = Marker::find($id);
		$assigned = Problem::where('type', '=', $marker->type)->first();
		return View::make('marker/show')->with('marker', $marker)
										->with('assigned', $assigned);
	}

	public function destroy($id)
	{
		$marker = Marker::find($id);
		$marker->delete();
		return Redirect::to('/map');
	}
	
}