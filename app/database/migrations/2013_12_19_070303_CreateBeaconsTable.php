<?php

use Illuminate\Database\Migrations\Migration;

class CreateBeaconsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('beacons', function($table) {
			$table->increments('id');
			$table->integer('store_id');
			$table->string('title');
			$table->string('uuid');
			$table->string('major');
			$table->string('minor');
			$table->text('description');
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
		Schema::drop('beacons');
	}

}