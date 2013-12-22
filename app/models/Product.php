<?php
use LaravelBook\Ardent\Ardent;

class Product extends Ardent {

	public static $rules = array(
		'title'		=> 'required',
		'ean' 		=> 'required',
		'price' 	=> 'required|numeric'
		);

	public function store()	{
		return $this->belongsTo('Store');
	}
}