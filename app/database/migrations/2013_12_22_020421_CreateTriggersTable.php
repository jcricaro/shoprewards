<?php

use Illuminate\Database\Migrations\Migration;

class CreateTriggersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('action_types', function($table) {
			$table->increments('id');
			$table->string('text');
			$table->string('trigger');
			$table->timestamps();
		});

		ActionType::create(array(
			'id'		=> 1,
			'text'		=> 'Walk In',
			'trigger'	=> 'b'
			));

		ActionType::create(array(
			'id'		=> 2,
			'text'		=> 'Enter Region',
			'trigger'	=> 'b'
			));

		ActionType::create(array(
			'id'		=> 3,
			'text'		=> 'Exit Region',
			'trigger'	=> 'b'
			));

		ActionType::create(array(
			'id'		=> 4,
			'text'		=> 'Scan',
			'trigger'	=> 'p'
			));

		ActionType::create(array(
			'id'		=> 5,
			'text'		=> 'Favorite',
			'trigger'	=> 'p'
			));

		ActionType::create(array(
			'id'		=> 6,
			'text'		=> 'Buy',
			'trigger'	=> 'p'
			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('action_types');
	}

}