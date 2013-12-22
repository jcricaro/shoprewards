<?php

use LaravelBook\Ardent\Ardent;

class Action extends Ardent {

	public static $rules = array(
		'title'			=> 'required',
		'store_id'		=> 'required',
		'trigger'		=> 'required',
		'trigger_id'	=> 'required',
		'type'			=> 'required'
		);

	public function actionType() {
		return $this->belongsTo('ActionType', 'type');
	}
}