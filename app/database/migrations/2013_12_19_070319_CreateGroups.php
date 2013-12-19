<?php

use Illuminate\Database\Migrations\Migration;

class CreateGroups extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('groups')->delete();

		Sentry::createGroup(array(
			'id'			=> 1,
			'name'			=> 'Users',
			'permissions'	=> array(
				)
			));

		Sentry::createGroup(array(
			'id'			=> 2,
			'name'			=> 'Store Administrators',
			'permissions'	=> array(
				)
			));

		Sentry::createGroup(array(
			'id'			=> 3,
			'name'			=> 'Administrators',
			'permissions'	=> array(
				'action'	=> 1,
				'beacon'	=> 1,
				'product'	=> 1,
				'reward'	=> 1,
				'store'		=> 1,
				'user'		=> 1
				)
			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$group = Sentry::findGroupById(1);
		$group->delete();

		$group = Sentry::findGroupById(2);
		$group->delete();

		$group = Sentry::findGroupById(3);
		$group->delete();
	}

}