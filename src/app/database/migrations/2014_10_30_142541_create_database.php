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
		Schema::create('ministarstvo', function($table)
		{
			$table->increments('sifMin');
			$table->string('imeMin', 100);
			$table->string('adresaMin', 100);
			$table->string('telefonMin', 30);
			$table->string('emailTajnistvo', 200);
			$table->binary('slikaMin');
		});
		Schema::create('funkcija', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->string('funkcijaDjelatnik', 100);
			$table->primary(array('sifMin', 'funkcijaDjelatnk'));
		});
		Schema::create('djelatnik', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->increments('sifDjelatnik');
			$table->string('imeDjelatnik', 100);
			$table->string('prezimeDjelatnik', 100);
			$table->string('titulaDjelatnik', 30);
			$table->string('emailDjelatnik', 200);
			$table->string('lozinkaDjelatnik', 30);
			$table->enum('dozvolaPristupa', array('0', '1', '2'))->default('0');
			$table->string('funkcijaDjelatnik', 100);
			$table->foreign('funkcijaDjelatnik')->references('funkcijaDjelatnik')->on('funkcija');
			$table->primary('sifMin');
		});
		Schema::create('vijest', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			$table->increments('sifVijest');
			$table->string('naslovVijest', 100);
			$table->text('tekstVijest');
			$table->timestamp('datumVijest');
			$table->integer('sifDjelatnik')->unsigned();
			$table->foreign('sifDjelatnik')->references('sifDjelatnik')->on('djelatnik');
			$table->primary('sifMin');
		});
		Schema::create('povijest', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');
			$table->string('naslovOdlomak', 100);
			$table->text('tekstPovijest');
			$table->primary(array('sifMin', 'naslovOdlomak'));
		});
		Schema::create('slika', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->increments('brSlika');
			$table->binary('slikaPov');
			$table->primary('sifMin');
		});
		Schema::create('kategorija', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->string('imeKategorija', 100);
			$table->primary(array('sifMin', 'imeKategorija'));
		});
		Schema::create('podkategorija', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->string('imePodkategorija', 100);
			$table->string('imeKategorija', 100);
			$table->foreign('imeKategorija')->references('imeKategorija')->on('kategorija');
			$table->primary(array('sifMin', 'imePodkategorija'));
		});
		Schema::create('dokument', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->increments('sifDokument');
			$table->string('imeKategorija', 100);
			$table->foreign('imeKategorija')->references('imeKategorija')->on('kategorija');
			$table->string('imePodkategorija', 100)->nullable();
			$table->foreign('imePodkategorija')->references('imePodkategorija')->on('podkategorija');
			$table->string('nazivDokument', 100);
			$table->string('tipDokument', 20);
			$table->text('opisDokument');
			$table->enum('oznakaPovjerljivosti', array('0', '1', '2'))->default('2');
			$table->binary('dokumentMin');
			$table->primary('sifMin');
		});
		Schema::create('akcija', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->increments('sifAkcija');
			$table->string('naslovAkcija', 100);
			$table->tekst('opisAkcija');
			$table->integer('maxBrPrijava')->unsigned();
			$table->primary('sifMin');
		});
		Schema::create('osoba', function($table)
		{
			$table->increments('sifOsoba');
			$table->string('imeOsoba', 100);
			$table->string('prezimeOsoba', 100);
			$table->string('emailOsoba', 200)->unique();
			$table->string('OIB', 11)->nullable();
		});
		Schema::create('kategorija_upita', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->string('kategUpit', 100);
			$table->primary(array('sifMin', 'kategUpit'));
		});
		Schema::create('upit_gradjana', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->increments('sifUpit');
			$table->string('emailOsoba', 200);
			$table->foreign('emailOsoba')->references('emailOsoba')->on('osoba');
			$table->string('naslovUpit', 50);
			$table->text('tekstUpit');
			$table->timestamp('vrijemeUpit');
			$table->string('kategUpit', 100);
			$table->foreign('kategUpit')->references('kategUpit')->on('kategorija_upita');
			$table->primary('sifMin');
		});
		Schema::create('upit_gradjana_djelatniku', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->integer('sifUpit')->unsigned();
			$table->foreign('sifUpit')->references('sifUpit')->on('upit_gradjana');
			$table->integer('sifDjelatnik')->unsigned();
			$table->foreign('sifDjelatnik')->references('sifDjelatnik')->on('djelatnik');
			$table->primary(array('sifMin', 'sifUpit', 'sifDjelatnik'));
		});
		Schema::create('privitak', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->increments('sifPrivitak');
			$table->binary('privitakPoruci');
			$table->primary('sifMin');
		});
		Schema::create('poruka_djelatniku', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->increments('sifPoruka');
			$table->string('naslovPoruka', 100);
			$table->text('tekstPoruka');
			$table->timestamp('vrijemePoruka');
			$table->integer('sifDjelatnik')->unsigned();
			$table->foreign('sifDjelatnik')->references('sifDjelatnik')->on('djelatnik');
			$table->integer('sifPrivitak')->unsigned()->nullable();
			$table->foreign('sifPrivitak')->references('sifPrivitak')->on('privitak');
			$table->primary('sifMin');
		});
		Schema::create('poruka_djelatnika_djelatniku', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->integer('sifPoruka')->unsigned();
			$table->foreign('sifPoruka')->references('sifPoruka')->on('poruka_djelatniku');
			$table->integer('sifDjelatnik')->unsigned();
			$table->foreign('sifDjelatnik')->references('sifDjelatnik')->on('djelatnik');
			$table->primary(array('sifMin', 'sifPoruka', 'sifDjelatnik'));
		});
		Schema::create('prijavljuje', function($table)
		{
			$table->integer('sifMin')->unsigned();
			$table->foreign('sifMin')->references('sifMin')->on('ministarstvo');$table->string('imeMin', 100);
			$table->integer('sifAkcija')->unsigned();
			$table->foreign('sifAkcija')->references('sifAkcija')->on('akcija');
			$table->integer('sifOsoba')->unsigned();
			$table->foreign('sifOsoba')->references('sifOsoba')->on('osoba');$table->string('imeMin', 100);
			$table->timestamp('vrijemePrijave');
			$table->primary(array('sifMin', 'sifAkcija', 'sifOsoba'));
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
		Schema::drop('poruka_djelatnika_djelatniku');
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
