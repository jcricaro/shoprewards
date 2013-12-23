<?php

use Illuminate\Database\Migrations\Migration;

class CreateRedeemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_redeems', function($table) {
			$table->increments('id');
			$table->integer('reward_id');
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
		Schema::drop('user_redeems');
	}

}