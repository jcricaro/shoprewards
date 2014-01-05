<?php

class PointController extends BaseController {

	protected $layout = 'layouts.master';
	
	function getIndex() {
		$this->layout->content = View::make('points.home')
			->with('title', 'Points Overview')
			->with('data', User::find(Sentry::getUser()->id)->storePoints)
			->with('total', User::find(Sentry::getUser()->id)->getStoreTotal());
	}

	function getBuy() {
		$this->layout->content = View::make('points.buy')
			->with('title', 'Buy Points')
			->with('stores', User::findOrFail(Sentry::getUser()->id)->stores);
	}

	function postBuy() {
		$o = new StorePoint;
		$o->value = Input::get('value');
		$o->store_id = Input::get('store_id');
		if(!$o->save()) {
			return Redirect::to('points/buy')
				->withInput()
				->with('error', $o->errors()->all());
		}
		else {
			return Redirect::to('points')
				->with('info', 'Transaction completed!');
		}
	}
}