<?php

class ProductController extends \BaseController {
	
	protected $layout = 'layouts.master';
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$this->layout->content = View::make('products.home')
			->with('title', 'Products')
			->with('data', Product::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('products.add')
			->with('title', 'Add Product');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$product = new Product;
		$product->title 			= Input::get('title');
		$product->ean 				= Input::get('ean');
		$product->price 			= Input::get('price');
		$product->description 		= Input::get('description');

		if(!$product->save()) {
			return Redirect::to('product/create')
				->withInput()
				->with('error', $product->errors()->all());

		}
		else {
			return Redirect::to('product')
				->with('info', 'Product has been added');
		}
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->layout->content = View::make('products.edit')
			->with('title', 'Edit Product')
			->with('data', Product::findOrFail($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::find($id);
		$product->title 			= Input::get('title');
		$product->price 			= Input::get('price');
		$product->ean 				= Input::get('ean');
		$product->description 		= Input::get('description');

		if($product->save()) {
			Session::flash('info', 'Product updated.');
			return Response::json(array('status' => true));
		}
		else {
			Session::flash('error', $product->errors()->all());
			return Response::json(array('status' => false));
		}

		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Product::find($id)->delete()) {
			return Response::json(array('status' => true));
		}
		return Response::json(array('status' => false));

	}

}