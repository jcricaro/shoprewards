<?php

use LaravelBook\Ardent\Ardent;

class Action extends Ardent {

	public static $rules = array(
		'title'			=> 'required',
		'store_id'		=> 'required',
		'trigger_id'	=> 'required',
		'type'			=> 'required'
		);

	public function actionType() {
		return $this->belongsTo('ActionType', 'type');
	}

	public function store() {
		return $this->belongsTo('Store');
	}

	public function trigger() {
		if($this->type == 1 || $this->type == 2 || $this->type == 3) {
			return $this->belongsTo('Beacon');
		}
		else if($this->type == 4 || $this->type == 5 || $this->type == 6) {
			return $this->belongsTo('Product');
		}
	}

	public function points() {
		return $this->hasMany('Point');
	}
}