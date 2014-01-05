<?php

use Illuminate\Database\Migrations\Migration;

class CreateGroupPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_points', function($table) {
			$table->increments('id');
			$table->integer('shop_id');
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
		Schema::drop('store_points');
	}

}