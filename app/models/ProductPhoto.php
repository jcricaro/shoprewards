<?php

class ProductPhoto extends Eloquent {
	protected $table = "product_photos";

	public function getPath() {
		return url('uploads') . '/original/' . $this->filename;
	}

	public function getRegular() {
		return url('uploads') . '/regular/' . $this->filename;
	}

	public function getThumbnail() {
		return url('uploads') . '/thumbnail/' . $this->filename;
	}
}