<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingFkeys extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table) {
			$table->foreign('tip')->references('id')->on('tipovi');
		});

		Schema::table('ovlasti', function($table) {
			$table->foreign('tip_id')->references('id')->on('tipovi')->onDelete('cascade');
		});

		Schema::table('vijesti', function($table) {
			$table->foreign('autor_id')->references('id')->on('users');
		});

		Schema::table('akcije_prijave', function($table) {
			$table->foreign('id_akcije')->references('id')->on('akcije')->onDelete('cascade');
		});

		Schema::table('privatne_poruke', function($table) {
			$table->foreign('sender_id')->references('id')->on('users');
			$table->foreign('reciever_id')->references('id')->on('users');
		});

		Schema::table('vanjske_poruke', function($table) {
			$table->foreign('reciever_id')->references('id')->on('users');
			$table->foreign('kat_id')->references('id')->on('vp_kat');
		});

		Schema::table('direktoriji', function($table) {
			$table->foreign('root')->references('id')->on('direktoriji')->onDelete('cascade');
		});

		Schema::table('datoteka', function($table) {
			$table->foreign('direktorij')->references('id')->on('direktoriji')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	}


}
