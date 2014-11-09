<?php

class VijestiSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        DB::table('vijesti')->delete();

        $this->command->info('Deleted all Vijesti');

        User::where('email', '=', 'default@ministarstvo.hr')->delete();
        $this->command->info('Deleted all users with email default@ministarstvo.hr');

        $defaultAuthor = User::create(array(
            'email' => 'default@ministarstvo.hr',
            'password' => Hash::make('ovonitkonecepogoditi'),
            'ime' => 'Difolto',
            'prezime' => 'Difoltich',
            'tip' => 0,
            'funkcija' => 'Default',
            'd_dozvola' => 5,
            'aktiviran' => true
        ));

        $this->command->info('Created default user');

        Vijesti::create(array(
            'autor_id' => $defaultAuthor->id,
            'objavljeno' => true,
            'naslov' => 'Prva vijest',
            'sadrzaj' => '# Ljudi moji\nPotrošili smo **proračun** za 2014!',
            'datum' => new DateTime('now')
        ));

        $this->command->info('Finished seeding vijesti');

    }

} 