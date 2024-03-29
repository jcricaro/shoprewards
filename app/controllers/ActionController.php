<?php

class ActionController extends \BaseController {
	
	protected $layout = 'layouts.master';
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->content = View::make('actions.home')
			->with('title', 'Actions')
			->with('data', User::find(Sentry::getUser()->id)->actions);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$stores = User::find(Sentry::getUser()->id)->stores;
		if($stores) {
			foreach($stores as $store) {
				$select[$store->id] = $store->title;
			}	
		}
		else {
			$select = null;
		}
		

		$this->layout->content = View::make('actions.add')
			->with('title', 'Add Action')
			->with('stores', $select);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$action = new Action;

		$action->store_id 			= Input::get('store_id');
		$action->title 				= Input::get('title');
		$action->description 		= Input::get('description');
		$action->trigger_id 		= Input::get('trigger_id');
		$action->type 				= Input::get('action');
		$action->value 				= Input::get('value');


		if(!$action->save()) {
			return Redirect::to('action/create')
				->withInput()
				->with('error', $action->errors()->all());

		}
		else {
			return Redirect::to('action')
				->with('info', 'Action has been added');
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
		$stores = User::find(Sentry::getUser()->id)->stores;
		if($stores) {
			foreach($stores as $store) {
				$select[$store->id] = $store->title;
			}	
		}
		else {
			$select = null;
		}

		$this->layout->content = View::make('actions.edit')
			->with('title', 'Edit Action')
			->with('data', Action::findOrFail($id))
			->with('stores', $select);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$action = Action::find($id);

		$action->store_id 			= Input::get('store_id');
		$action->title 				= Input::get('title');
		$action->description 		= Input::get('description');
		$action->trigger_id 		= Input::get('trigger_id');
		$action->type 				= Input::get('action');
		$action->value 				= Input::get('value');


		if($action->save()) {
			Session::flash('info', 'Action updated.');
			return Response::json(array('status' => true));
		}
		else {
			Session::flash('error', $action->errors()->all());
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
		if(Action::find($id)->delete()) {
			Session::flash('info', 'Action deleted');
			return Response::json(array('status' => true));
		}
		Session::flash('error', 'Problem while deleting action');
		return Response::json(array('status' => false));
	}

}