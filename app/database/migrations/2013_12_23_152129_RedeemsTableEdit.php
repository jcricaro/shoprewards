<?php

use Illuminate\Database\Migrations\Migration;

class RedeemsTableEdit extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_redeems', function($table) {
			$table->integer('user_id')->after('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_redeems', function($table) {
			$table->dropColumn('user_redeems');
		});
	}

}