<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsnovniPodaciTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('osnovni_podaci', function($table) {
			$table->increments('id');
			$table->string('naziv'); //npr Ministarstvo interstelarnog dostavljanja paketa
			$table->string('podnaziv'); //npr Robonia
			$table->text('povijest');
			$table->string('adresa');
			$table->string('telefon');
			$table->string('email');
			$table->string('emblem_lokacija');
			$table->string('slika_lokacija');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('osnovni_podaci');
	}

}
