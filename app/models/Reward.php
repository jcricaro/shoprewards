<?php

class Reward extends Eloquent {

	public function store()	{
		return $this->belongsTo('Store');
	}
}