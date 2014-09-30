<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('AV', function(Blueprint $table)
		{
			$table->string('Naslov');
			$table->string('Autor');
			$table->string('Izdavac');
			$table->string('Napomena');
			$table->increments('AVID');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('AV');
	}

}
