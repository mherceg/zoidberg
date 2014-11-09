<?php

class OsnovniPodaciSeeder extends \Illuminate\Database\Seeder {

    public function run(){
        DB::table('osnovni_podaci')->delete();

        $this->command->info('Deleted all Osnovni_podaci');

        OsnovniPodaci::create(array(
            'naziv' => 'Ministarstvo interstelarnog dostavljanja paketa',
            'podnaziv' => 'Robonia',
            'povijest' => 'Radimo već jako dugo',
            'adresa' => 'Planet Express HQ, 57th Street, Manhattan, New New York',
            'telefon' => 'u izradi',
            'email' => 'zoidberg_pex@gmail.com',
            'emblem_lokacija' => 'assets/images/zoidberg_grb.png',
            'slika_lokacija' => 'assets/images/planet-express-building.png'
        ));

    }

} 