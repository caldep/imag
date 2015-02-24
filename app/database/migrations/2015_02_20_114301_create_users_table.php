<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->bigInteger('phone');
            $table->date('birthday');
            $table->string('password');
            $table->integer('photo_id')->unsigned();
            $table->string('remember_token');
            $table->timestamps();
		});

        Schema::create('photos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('real_name');
            $table->string('path_name');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->drop();
		});

        Schema::table('photos', function(Blueprint $table)
        {
            $table->drop();
        });
	}

}
