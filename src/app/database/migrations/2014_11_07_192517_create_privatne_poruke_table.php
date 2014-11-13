<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivatnePorukeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('privatne_poruke', function($table) {
			$table->increments('id');
			$table->integer('sender_id')->unsigned();
			$table->integer('reciever_id')->unsigned();
			$table->string('naslov');
			$table->text('sadrzaj');
			$table->dateTime('vrijeme');
			$table->string('privitak_lokacija');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('privatne_poruke');
	}

}
