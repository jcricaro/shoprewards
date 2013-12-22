<?php

class StoreController extends \BaseController {

	protected $layout = 'layouts.master';
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->content = View::make('stores.home')
			->with('title', 'Stores')
			->with('data', Store::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('stores.add')
			->with('title','Add Store');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->layout->content = View::make('stores.edit')
			->with('title', 'Edit Store')
			->with('data', Store::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function products() {
		$id = Input::get('store_id');
		$products = Product::where('store_id', $id)->get();
		$html = "";
		foreach($products as $product) {
			$html .= "<option value=".$product->id.">".$product->title."</option>";
		}

		return Response::json(array('html' => $html));
	}

	public function beacons() {
		$id = Input::get('store_id');
		$beacons = Beacon::where('store_id', $id)->get();
		$html = "";
		foreach($beacons as $beacon) {
			$html .= "<option value=".$beacon->id.">".$beacon->title."</option>";
		}

		return Response::json(array('html' => $html));
	}

}