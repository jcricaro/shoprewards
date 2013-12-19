<?php
class Beacon extends Eloquent {
	public function store()	{
		return $this->belongsTo('Store');
	}
}