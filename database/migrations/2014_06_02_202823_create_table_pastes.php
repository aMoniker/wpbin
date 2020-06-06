<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePastes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastes', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('parent_id')->unsigned()->nullable()->default(null)->index();
            $table->bigInteger('user_id')->unsigned()->nullable()->default(null)->index();
            $table->string('hash', 127)->unique();
            $table->string('title', 255)->nullable()->default(null);
            $table->longText('content');

            $table->timestamps();

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
        Schema::table('pastes', function (Blueprint $table) {
            Schema::drop('pastes');
        });
    }
}
