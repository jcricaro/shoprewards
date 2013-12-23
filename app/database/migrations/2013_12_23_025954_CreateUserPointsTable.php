<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_points', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('action_id');
			$table->integer('value');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_points');
	}

}