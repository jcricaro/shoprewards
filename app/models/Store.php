<?php

class Store extends Eloquent {
	public function rewards() {
		return $this->hasMany('Reward');
	}

	public function products() {
		return $this->hasMany('Product');	
	}

	public function beacons() {
		return $this->hasMany('Beacon');
	}

	public function store() {
		return $this->belongsTo('User');
	}	
}