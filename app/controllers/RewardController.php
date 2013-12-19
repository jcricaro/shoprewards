<?php

class RewardController extends \BaseController {
	
	protected $layout = 'layouts.master';
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->content = View::make('rewards.home')
			->with('title', 'Rewards')
			->with('data', User::findOrFail(Sentry::getUser()->id)->rewards);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('rewards.add')
			->with('title', 'Add Reward')
			->with('stores', User::findOrFail(Sentry::getUser()->id)->stores);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$store = new Reward;
		$store->title 			= Input::get('title');
		$store->value 			= Input::get('value');
		$store->description 	= Input::get('description');
		$store->store_id 		= Input::get('store_id');

		if(!$store->save()) {
			return Redirect::to('reward/create')
				->withInput()
				->with('error', $reward->errors()->all());
		}
		else {
			return Redirect::to('reward')
				->with('info', 'Reward has been added');
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
		$this->layout->content = View::make('rewards.edit')
			->with('title', 'Edit Reward');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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