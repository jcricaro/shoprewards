<?php

use Illuminate\Database\Migrations\Migration;

class AddTriggerColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('actions', function($table) {
			$table->string('trigger')->after('store_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('actions', function($table) {
			$table->dropColumn('trigger');
		});
	}

}