<?php
use LaravelBook\Ardent\Ardent;

class Product extends Ardent {

	protected $softDelete = true;

	public static $rules = array(
		'title'		=> 'required',
		'ean' 		=> 'required',
		'price' 	=> 'required|numeric'
		);

	public function store()	{
		return $this->belongsTo('Store');
	}

	public function getPhotos() {
		return $this->hasMany('ProductPhoto');
	}
}