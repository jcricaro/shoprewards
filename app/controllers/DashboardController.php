<?php

class DashboardController extends BaseController {

	protected $layout = 'layouts.master';

	public function getIndex() {
		$this->layout->content = View::make('dashboard.home')
			->with('title','Dashboard')
			->with('purchasedPoints', User::find(Sentry::getUser()->id)->storePoints()->sum('value'))
			->with('consumedPoints', User::find(Sentry::getUser()->id)->storeRedeems()->sum('value'))
			->with('remainingPoints', User::find(Sentry::getUser()->id)->getStoreTotal())
			->with('actions', User::find(Sentry::getUser()->id)->actions->count());
	}
}