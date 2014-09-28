<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('razredi', function(Blueprint $table)
		{
			$table->integer('Ucenik');
			$table->integer('Razred');
			$table->integer('Broj');
			$table->text('Slovo');
			$table->increments('ID');
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
		Schema::drop('razredi');
	}

}
