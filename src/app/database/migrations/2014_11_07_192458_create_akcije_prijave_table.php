<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkcijePrijaveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('akcije_prijave', function($table) {
			$table->increments('id');
			$table->integer('id_akcije')->unsigned();
			$table->string('ime');
			$table->string('prezime');
			$table->string('email')->unique();
			$table->string('oib')->unique(); //vodece nule
			$table->dateTime('vrijeme');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
