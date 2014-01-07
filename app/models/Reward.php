<?php

class Reward extends Eloquent {

	protected $softDelete = true;

	public function store()	{
		return $this->belongsTo('Store');
	}
}