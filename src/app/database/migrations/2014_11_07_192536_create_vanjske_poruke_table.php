<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanjskePorukeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vanjske_poruke', function($table) {
			$table->increments('id');
			$table->integer('reciever_id')->unsigned()->nullable();
			$table->integer('kat_id')->unsigned();
			$table->string('naslov');
			$table->text('sadrzaj');
			$table->dateTime('vrijeme');
			$table->string('sender_mail');
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
