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

	public function user() {
		return $this->belongsTo('User');
	}

	public function redeems() {
		return $this->belongsTo('StoreRedeem');
	}
}