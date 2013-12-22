<?php

use Illuminate\Database\Migrations\Migration;

class EditActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('actions', function($table) {
			$table->dropColumn('trigger');
			
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
			$table->integer('trigger')->after('store_id');
		});
	}

}