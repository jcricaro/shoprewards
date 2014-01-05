<?php

use Illuminate\Database\Migrations\Migration;

class StoreRedeemController extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_redeems', function($table) {
			$table->increments('id');
			$table->integer('store_id');
			$table->integer('user_id');
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
		Schema::drop('store_redeems');
	}

}