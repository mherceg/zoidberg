<?php

class AkcijeSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        DB::table('akcije')->delete();

        $this->command->info('Deleted all Akcije');

        Akcije::create(array(
            'naziv' => 'Sadnja stabala u Striborovoj šumi',
            'opis' => 'U nedavnom, nepodmetnutom, požaru je stradala većina Striborove šume. Kako bi Stribor imao dovoljno drva za ogrijev idućih 20-ak godina, zajedničkim snagama, ujedinjeni, jači nego ikad, idemo naprijed! Posadit ćemo mu novu šumu.',
            'max_ljudi' => 80
        ));
        Akcije::create(array(
            'naziv' => 'Dan druženja s Kiklofazima',
            'opis' => 'Godišnje druženje s Kiklofazima se tradicionalno održava u jesen već 40 godina. Ove godine smo za Vas pripremili bogat program i još bogatiji švedski stol. Obavezno pozovite sve svoje prijatelje kiklope.',
            'max_ljudi' => 400
        ));
        Akcije::create(array(
            'naziv' => 'Caturday',
            'opis' => 'Ove subote naše ministarstvo organizira veliko druženje mačaka! Ako vaša mačka nema prijatelja i dane provodi gledajući kroz prozor tužnog pogleda, dovedite je i zabavite se zajedno s njom!',
            'max_ljudi' => 20
        ));
    }
}