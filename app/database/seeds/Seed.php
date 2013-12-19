<?php

class Seed extends Seeder {
	
	public function run() {
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
			'ean' => '123456',
			'price' => '25',
			'description' => 'I am a description'
			));
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
			'ean' => '123456',
			'price' => '25',
			'description' => 'I am a description'
			));
		Product::create(array(
			'store_id' => 1,
			'title' => 'Test',
			'ean' => '123456',
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

		DB::table('stores')->delete();
		$store = Store::create(array(
			'id'			=> 1,
			'user_id' 		=> $user->id,
			'title' 		=> 'Store 101',
			'description' 	=> 'I am a description',
			'address' 		=> '101 street, Makati QC'
			));

		$code = $user->getActivationCode();
		$user = Sentry::findUserById($user->id);
		$user->attemptActivation($code);

		DB::table('beacons')->delete();

		Beacon::create(array(
			'uuid' => '1234567894563',
			'major' => '123456',
			'minor' => '123456',
			'store_id' => $store->id,
			'title' => 'Entrance'
			));

		Beacon::create(array(
			'uuid' => '1234567894563',
			'major' => '123456',
			'minor' => '123456',
			'store_id' => $store->id,
			'title' => 'Pants'
			));

		Beacon::create(array(
			'uuid' => '1234567894563',
			'major' => '123456',
			'minor' => '123456',
			'store_id' => $store->id,
			'title' => 'Jackets'
			));

		DB::table('rewards')->delete();

		Reward::create(array(
			'title' => 'Reward 1',
			'value' => 500,
			'store_id' => $store->id
			));

		Reward::create(array(
			'title' => 'Reward 2',
			'value' => 234,
			'store_id' => $store->id
			));

		Reward::create(array(
			'title' => 'Reward 3',
			'value' => 12,
			'store_id' => $store->id
			));

		Reward::create(array(
			'title' => 'Reward 4',
			'value' => 50,
			'store_id' => $store->id
			));
	}
}