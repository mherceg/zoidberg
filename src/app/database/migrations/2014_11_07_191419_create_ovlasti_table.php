<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOvlastiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ovlasti', function($table) {
			$table->increments('id');
			$table->integer('tip_id')->unsigned();
			$table->string('modul'); //npr vijesti
			$table->string('ovlast'); //npr Robonia
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ovlasti');
	}

}
