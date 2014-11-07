<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		echo("ministarstvo1\n");
		Schema::create('ministarstvo', function($table)
		{
			$table->increments('sifMin');
			$table->string('imeMin', 100);
			$table->string('adresaMin', 100);
			$table->string('telefonMin', 30);
			$table->string('emailTajnistvo', 200);
			$table->binary('slikaMin');
		});
		
		echo("funkcija1\n");
		Schema::create('funkcija', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->string('funkcijaDjelatnik', 100);
			$table->primary(array('sifMin', 'funkcijaDjelatnik'));
		});
		echo("funkcija2\n");
		Schema::table('funkcija', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
		});
		
		echo("djelatnik1\n");
		Schema::create('djelatnik', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->increments('sifDjelatnik');
			$table->string('imeDjelatnik', 100);
			$table->string('prezimeDjelatnik', 100);
			$table->string('titulaDjelatnik', 30);
			$table->string('email', 200);
			$table->string('password', 30);
			$table->enum('dozvolaPristupa', array('0', '1', '2'))->default('0');
			$table->string('funkcijaDjelatnik', 100);
			//$table->primary(array('sifMin', 'sifDjelatnik'));
		});


		echo("djelatnik2\n");
		Schema::table('djelatnik', function($table)
		{
			//$table->primary(array('sifMin', 'sifDjelatnik'));
			//$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			//$table->foreign('funkcijaDjelatnik')->references('funkcijaDjelatnik')->on('funkcija');
		});
		
		echo("vijesti1\n");
		Schema::create('vijest', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->increments('sifVijest');
			$table->string('naslovVijest', 100);
			$table->text('tekstVijest');
			$table->timestamp('datumVijest');
			$table->integer('sifDjelatnik')->unsigned();
			//$table->primary('sifMin');
		});
		echo("vijesti2\n");
		Schema::table('vijest', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			//$table->foreign('sifDjelatnik')->references('sifDjelatnik')->on('djelatnik');
		});
		
		echo("povijest1\n");
		Schema::create('povijest', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->string('naslovOdlomak', 100);
			$table->text('tekstPovijest');
			$table->primary(array('sifMin', 'naslovOdlomak'));
		});
		echo("povijest2\n");
		Schema::table('povijest', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
		});
		
		echo("slika1\n");
		Schema::create('slika', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->increments('brSlika');
			$table->binary('slikaPov');
			//$table->primary('sifMin');
		});
		echo("slika2\n");
		Schema::table('slika', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
		});
		
		echo("kategorija1\n");
		Schema::create('kategorija', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->string('imeKategorija', 100);
			$table->primary(array('sifMin', 'imeKategorija'));
		});
		echo("kategorija2\n");
		Schema::table('kategorija', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
		});
		
		echo("podkategorija1\n");
		Schema::create('podkategorija', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->string('imePodkategorija', 100);
			$table->string('imeKategorija', 100);
			$table->primary(array('sifMin', 'imePodkategorija'));
		});
		echo("podkategorija2\n");
		Schema::table('podkategorija', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			//$table->foreign('imeKategorija')->references('imeKategorija')->on('kategorija');
		});
		
		echo("dokument1\n");
		Schema::create('dokument', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->increments('sifDokument');
			$table->string('imeKategorija', 100);
			$table->string('imePodkategorija', 100)->nullable();
			$table->string('nazivDokument', 100);
			$table->string('tipDokument', 20);
			$table->text('opisDokument');
			$table->enum('oznakaPovjerljivosti', array('0', '1', '2'))->default('2');
			$table->binary('dokumentMin');
			//$table->primary('sifMin');
		});
		echo("dokumnet2\n");
		Schema::table('dokument', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			//$table->foreign('imeKategorija')->references('imeKategorija')->on('kategorija');
			//$table->foreign('imePodkategorija')->references('imePodkategorija')->on('podkategorija');
		});
		
		echo("akcija1\n");
		Schema::create('akcija', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->increments('sifAkcija');
			$table->string('naslovAkcija', 100);
			$table->text('opisAkcija');
			$table->integer('maxBrPrijava')->unsigned();
			//$table->primary('sifMin');
		});
		echo("akcija2\n");
		Schema::table('akcija', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
		});
		
		echo("osoba1\n");
		Schema::create('osoba', function($table)
		{
			$table->increments('sifOsoba');
			$table->string('imeOsoba', 100);
			$table->string('prezimeOsoba', 100);
			$table->string('emailOsoba', 200)->unique();
			$table->string('OIB', 11)->nullable();
		});
		
		echo("kategorija_upita\n");
		Schema::create('kategorija_upita', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->string('kategUpit', 100);
			$table->primary(array('sifMin', 'kategUpit'));
		});
		Schema::table('kategorija_upita', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
		});
		
		echo("upit_gradjana1\n");
		Schema::create('upit_gradjana', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->increments('sifUpit');
			$table->string('emailOsoba', 200);
			$table->string('naslovUpit', 50);
			$table->text('tekstUpit');
			$table->timestamp('vrijemeUpit');
			$table->string('kategUpit', 100);
			//$table->primary('sifMin');
		});
		echo("upit_gradjana2\n");
		Schema::table('upit_gradjana', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			$table->foreign('emailOsoba')->references('emailOsoba')->on('osoba');
			//$table->foreign('kategUpit')->references('kategUpit')->on('kategorija_upita');
		});
		
		echo("upit_gradjana_djelatniku1\n");
		Schema::create('upit_gradjana_djelatniku', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->integer('sifUpit')->unsigned();
			$table->integer('sifDjelatnik')->unsigned();
			$table->primary(array('sifMin', 'sifUpit', 'sifDjelatnik'));
		});
		echo("upit_gradjana_djelatniku2\n");
		Schema::table('upit_gradjana_djelatniku', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			$table->foreign('sifUpit')->references('sifUpit')->on('upit_gradjana');
			$table->foreign('sifDjelatnik')->references('sifDjelatnik')->on('djelatnik');
		});
		
		echo("privitak1\n");
		Schema::create('privitak', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->increments('sifPrivitak');
			$table->binary('privitakPoruci');
			//$table->primary('sifMin');
		});
		echo("privitak2\n");
		Schema::table('privitak', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
		});
		
		echo("poruka_djelatniku1\n");
		Schema::create('poruka_djelatniku', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->increments('sifPoruka');
			$table->string('naslovPoruka', 100);
			$table->text('tekstPoruka');
			$table->timestamp('vrijemePoruka');
			$table->integer('sifDjelatnik')->unsigned();
			$table->integer('sifPrivitak')->unsigned()->nullable();
			//$table->primary('sifMin');
		});
		echo("poruka_djelatniku2\n");
		Schema::table('poruka_djelatniku', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			$table->foreign('sifDjelatnik')->references('sifDjelatnik')->on('djelatnik');
			$table->foreign('sifPrivitak')->references('sifPrivitak')->on('privitak');
		});
		
		echo("pdd\n");
		Schema::create('pdd', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->integer('sifPoruka')->unsigned();
			$table->integer('sifDjelatnik')->unsigned();
			$table->primary(array('sifMin', 'sifPoruka', 'sifDjelatnik'));
		});
		echo("pdd2\n");
		Schema::table('pdd', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			$table->foreign('sifPoruka')->references('sifPoruka')->on('poruka_djelatniku');
			$table->foreign('sifDjelatnik')->references('sifDjelatnik')->on('djelatnik');
		});
		
		echo("280");
		Schema::create('prijavljuje', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->integer('sifAkcija')->unsigned();
			$table->integer('sifOsoba')->unsigned();
			$table->timestamp('vrijemePrijave');
			$table->primary(array('sifMin', 'sifAkcija', 'sifOsoba'));
		});
		echo("289");
		Schema::table('prijavljuje', function($table)
		{
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			$table->foreign('sifAkcija')->references('sifAkcija')->on('akcija');
			$table->foreign('sifOsoba')->references('sifOsoba')->on('osoba');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prijavljuje');
		Schema::drop('pdd');
		Schema::drop('poruka_djelatniku');
		Schema::drop('privitak');
		Schema::drop('upit_gradjana_djelatniku');
		Schema::drop('upit_gradjana');
		Schema::drop('kategorija_upita');
		Schema::drop('osoba');
		Schema::drop('akcija');
		Schema::drop('dokument');
		Schema::drop('podkategorija');
		Schema::drop('kategorija');
		Schema::drop('slika');
		Schema::drop('povijest');
		Schema::drop('vijest');
		Schema::drop('djelatnik');
		Schema::drop('funkcija');
		Schema::drop('ministarstvo');
	}

}
