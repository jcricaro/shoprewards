<?php

class PointController extends BaseController {

	protected $layout = 'layouts.master';
	
	function getIndex() {
		$this->layout->content = View::make('points.home')
			->with('title', 'Points Overview');
	}

	function getBuy() {
		$this->layout->content = View::make('points.buy')
			->with('title', 'Buy Points');
	}
}