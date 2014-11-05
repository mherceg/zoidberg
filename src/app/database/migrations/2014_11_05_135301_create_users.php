<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('djelatnik', function($table)
		{
			$table->increments('sifDjelatnik');
			$table->string('imeDjelatnik', 100);
			$table->string('prezimeDjelatnik', 100);
			$table->string('titulaDjelatnik', 30);
			$table->string('emailDjelatnik', 200);
			$table->string('lozinkaDjelatnik', 30);
			$table->enum('dozvolaPristupa', array('0', '1', '2'))->default('0');
			$table->string('funkcijaDjelatnik', 100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("djelatnik");
	}

}
