<?php

use Illuminate\Database\Migrations\Migration;

class AddTitleColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('actions', function($table) {
			$table->string('title')->after('trigger_id');
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
			$table->dropColumn('title');
		});
	}

}