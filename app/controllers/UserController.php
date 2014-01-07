<?php

class UserController extends \BaseController {

	protected $layout = 'layouts.master';
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->content = View::make('users.home')
			->with('title', 'Users')
			->with('data', User::where('id', '!=', 1)->get());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('users.add')
			->with('title', 'Add User');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try {
			$user = Sentry::createUser(array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'first_name' => Input::get('first_name'),
				'last_name' => Input::get('last_name'),
				'gender' => Input::get('gender'),
				'city' => Input::get('city'),
				'zipcode' => Input::get('zipcode'),
				'activated' => true
				));

			return Redirect::to('user')
				->with('info', 'User has been added');
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
		    return Redirect::to('user/create')
				->withInput()
				->with('error', array('Password field is required'));
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
		    return Redirect::to('user/create')
				->withInput()
				->with('error', array('Email field is required'));
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e) {
		    return Redirect::to('user/create')
				->withInput()
				->with('error', array('User login already exists'));
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		 	return Redirect::to('user/create')
				->withInput()
				->with('error', array('Group was not found'));   
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
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
		$this->layout->content = View::make('users.edit')
			->with('title', 'Edit User')
			->with('data', User::findOrFail($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$user->last_name = Input::get('last_name');
		$user->first_name = Input::get('first_name');
		$user->gender = Input::get('gender');
		$user->city = Input::get('city');
		$user->zipcode = Input::get('zipcode');

		if($user->save()) {
			Session::flash('info', 'User updated.');
			return Response::json(array('status' => true));
		}
		else {
			Session::flash('error', $user->errors()->all());
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
		//
	}

}