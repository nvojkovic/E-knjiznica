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
		Schema::create('korisnici', function(Blueprint $table)
		{
			$table->string('Ime');
			$table->string('Prezime');
			$table->string('Tip');
			$table->integer('Razred');
			$table->increments('UserID');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('korisnici');
	}

}
