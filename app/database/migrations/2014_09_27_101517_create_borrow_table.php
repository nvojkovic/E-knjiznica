<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posudbe', function(Blueprint $table)
		{
			$table->integer('Korisnik');
			$table->integer('Knjiga');
			$table->integer('DatumPosudbe');
			$table->integer('DatumVracanja');
			$table->increments('ID');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posudbe');
	}

}
