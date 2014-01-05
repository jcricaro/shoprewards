<?php

use Illuminate\Database\Migrations\Migration;

class ActionsTableValue extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('actions', function($table) {
			$table->integer('value')->after('description');
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
			$table->dropColumn('value');
		});
	}

}