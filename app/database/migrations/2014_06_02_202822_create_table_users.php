<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->engine = 'InnoDB';

			$table->bigIncrements('id')->unsigned();
			$table->string('first_name', 255)->nullable()->default(null);
			$table->string('last_name', 255)->nullable()->default(null);
			$table->string('username', 127);
			$table->string('email', 127);
			$table->tinyInteger('active')->default(1);

			$table->timestamps();

			$table->unique('username');
			$table->unique('email');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
