<?php

class Seed extends Seeder {
	
	public function run() {
		DB::table('stores')->delete();

		
		Store::create(array(
			'id'			=> 1,
			'user_id' 		=> 1,
			'title' 		=> 'Store 101',
			'description' 	=> 'I am a description',
			'address' 		=> '101 street, Makati QC'
			));

		DB::table('products')->delete();

		Product::create(array(
			'store_id' => 1,
			'title' => 'Test',
			'ean' => '123456',
			'price' => '25',
			'description' => 'I am a description'
			));
		Product::create(array(
			'store_id' => 1,
			'title' => 'Test',
			'ean' => '123455',
			'price' => '25',
			'description' => 'I am a description'
			));
		Product::create(array(
			'store_id' => 1,
			'title' => 'Test',
			'ean' => '123454',
			'price' => '25',
			'description' => 'I am a description'
			));
		Product::create(array(
			'store_id' => 1,
			'title' => 'Test',
			'ean' => '123453',
			'price' => '25',
			'description' => 'I am a description'
			));
		Product::create(array(
			'store_id' => 1,
			'title' => 'Test',
			'ean' => '123452',
			'price' => '25',
			'description' => 'I am a description'
			));

		DB::table('users')->delete();

		$user = Sentry::register(array(
			'id'	 	=> 1,
			'email'    	=> 'admin@email.com',
			'password' 	=> '123456',
		));

		Sentry::findUserById(1)->addGroup(Sentry::findGroupById(3));

		$code = $user->getActivationCode();
		$user = Sentry::findUserById(1);
		$user->attemptActivation($code);

		$testuser = Sentry::register(array(
			'id'		=> 2,
			'email'		=> 'a@a.com',
			'password'	=> '123'
			));

		Sentry::findUserById(2)->addGroup(Sentry::findGroupById(3));

		$code = $testuser->getActivationCode();
		$testuser = Sentry::findUserById(2);
		$testuser->attemptActivation($code);

		DB::table('beacons')->delete();

		Beacon::create(array(
			'uuid' => 'uuid1',
			'major' => '123456',
			'minor' => '123456',
			'store_id' => 1,
			'title' => 'Entrance'
			));

		Beacon::create(array(
			'uuid' => 'uuid2',
			'major' => '123456',
			'minor' => '123456',
			'store_id' => 1,
			'title' => 'Pants'
			));

		Beacon::create(array(
			'uuid' => 'uuid3',
			'major' => '123456',
			'minor' => '123456',
			'store_id' => 1,
			'title' => 'Jackets'
			));

		DB::table('rewards')->delete();

		Reward::create(array(
			'title' => 'Reward 1',
			'value' => 500,
			'store_id' => 1
			));

		Reward::create(array(
			'title' => 'Reward 2',
			'value' => 234,
			'store_id' => 1
			));

		Reward::create(array(
			'title' => 'Reward 3',
			'value' => 12,
			'store_id' => 1
			));

		Reward::create(array(
			'title' => 'Reward 4',
			'value' => 50,
			'store_id' => 1
			));
	}
}