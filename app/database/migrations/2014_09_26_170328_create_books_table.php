<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('knjige', function(Blueprint $table)
		{
			$table->string('Naslov');
			$table->string('Autor');
			$table->string('Impresum');
			$table->string('Materijalni');
			$table->string('NakladnaCjelina');
			$table->string('Napomena');
			$table->string('Naklada');
			$table->string('Sadrzaj');
			$table->string('ISBN');
			$table->string('Signatura');
			$table->integer('CIP');
			$table->string('Izdanje');
			$table->integer('Otpis');
			$table->string('Tip');
			$table->string('Nabava');
			$table->string('Kupljeno');
			$table->softDeletes();
			$table->increments('BookID');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('knjige');
	}

}
