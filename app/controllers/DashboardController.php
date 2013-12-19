<?php

class DashboardController extends BaseController {

	protected $layout = 'layouts.master';

	public function getIndex() {
		$this->layout->content = View::make('dashboard.home')
			->with('title','Dashboard');
	}
}