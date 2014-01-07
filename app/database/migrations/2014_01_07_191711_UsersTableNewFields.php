<?php

use Illuminate\Database\Migrations\Migration;

class UsersTableNewFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table) {
			$table->enum('gender', array('m', 'f'))->after('last_name')->nullable()->default(null);
			$table->string('zipcode', 10)->after('gender')->nullable();
			$table->string('city', 20)->after('zipcode')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table) {
			$table->dropColumn('gender');
			$table->dropColumn('zipcode');
			$table->dropColumn('city');
		});
	}

}