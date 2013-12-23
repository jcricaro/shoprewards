<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getCurrentPoints() {
		return Point::where('user_id', $this->id)->sum('value') - Redeem::where('user_id', $this->id)->sum('value');
	}

	public function actions() {
		return $this->hasManyThrough('Action', 'Store');
	}

	public function stores() {
		return $this->hasMany('Store');
	}

	public function rewards() {
		return $this->hasManyThrough('Reward', 'Store');
	}

	public function beacons() {
		return $this->hasManyThrough('Beacon', 'Store');
	}

	public function products() {
		return $this->hasManyThrough('Product', 'Store');	
	}

}