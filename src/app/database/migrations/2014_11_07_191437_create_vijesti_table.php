<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVijestiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vijesti', function($table) {
			$table->increments('id');
			$table->integer('autor_id')->unsigned();
			$table->boolean('objavljeno');
			$table->string('naslov');
			$table->text('sadrzaj'); //markdown
			$table->dateTime('datum');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vijesti');
	}

}
