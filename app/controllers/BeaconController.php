<?php

class BeaconController extends \BaseController {

	protected $layout = 'layouts.master';
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->content = View::make('beacons.home')
			->with('title', 'Beacons')
			->with('data', Beacon::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('beacons.add')
			->with('title', 'Add Beacon')
			->with('stores', User::find(Sentry::getUser()->id)->stores());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$beacon = new Beacon;
		$beacon->title = Input::get('title');
		$beacon->uuid = Input::get('uuid');
		$beacon->major = Input::get('major');
		$beacon->minor = Input::get('minor');
		$beacon->store_id = Input::get('store_id');
		$beacon->description = Input::get('description');

		if(!$beacon->save()) {
			return Redirect::to('beacon/create')
				->withInput()
				->with('error', $beacon->errors()->all());
		}
		else {
			return Redirect::to('beacon')
				->with('info', 'Beacon has been added');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->layout->content = View::make('beacons.edit')
			->with('title', 'Edit Product')
			->with('data', Beacon::findOrFail($id))
			->with('stores', User::findOrFail(Sentry::getUser()->id)->stores());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$beacon = Beacon::find($id);
		$beacon->title = Input::get('title');
		$beacon->uuid = Input::get('uuid');
		$beacon->major = Input::get('major');
		$beacon->minor = Input::get('minor');
		$beacon->store_id = Input::get('store_id');
		$beacon->description = Input::get('description');

		if($beacon->save()) {
			Session::flash('info', 'Beacon updated.');
			return Response::json(array('status' => true));
		}
		else {
			Session::flash('error', $beacon->errors()->all());
			return Response::json(array('status' => false));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}