<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatotekeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('datoteka', function($table) {
			$table->increments('id');
			$table->integer('direktorij')->unsigned();
			$table->string('naziv');
			$table->string('lokacija');
			$table->integer('potrebna_dozvola');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('datoteka');
	}

}
