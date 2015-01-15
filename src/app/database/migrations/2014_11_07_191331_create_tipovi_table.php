<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoviTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipovi', function($table) {
			$table->increments('id');
			$table->integer('d_dozvola_def')->unsigned();
			$table->string('naziv_tipa');
			$table->string('titula');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tipovi');
	}

}
