<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePastes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pastes', function($table)
		{
			$table->engine = 'InnoDB';

			$table->bigIncrements('id')->unsigned();
			$table->bigInteger('parent_id')->unsigned()->nullable()->default(null);
			$table->bigInteger('user_id')->unsigned()->nullable()->default(null);
			$table->string('hash', 127);
			$table->string('title', 255)->nullable()->default(null);
			$table->longText('content');

			$table->timestamps();

			$table->index('parent_id');
			$table->index('user_id');
			$table->unique('hash');

			$table->foreign('parent_id')
				->references('id')->on('pastes')
				->onDelete('cascade');

			$table->foreign('user_id')
				->references('id')->on('users')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pastes');
	}

}
