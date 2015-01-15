<?php

class EventsController extends BaseController
{

    public function retrivePageTitle()
    {
        return "Akcije";
    }

    public function getIndex()
    {
        return View::make('events.index', array(
            'akcije' => Akcije::orderBy('naziv')->get()
        ));
    }

    public function getPrijava($id_akcije)
    {
        $akcija = Akcije::find($id_akcije);
        return View::make('events.prijava', array('akcija' => $akcija));
    }

    public function postPrijava()
    {
        $id_akcije = Input::get('id_akcije');
        $ime = Input::get('ime');
        $prezime = Input::get('prezime');
        $email = Input::get('email');
        $oib = Input::get('oib');
        try {
            AkcijePrijave::insert(array(
                'id_akcije' => $id_akcije,
                'ime' => $ime,
                'prezime' => $prezime,
                'email' => $email,
                'oib' => $oib,
                'vrijeme' => time()
            ));
            $alert = array('title' => 'Prijava uspjela!', 'content' => 'Uspješno se se prijavili na akciju.');

        }
        catch(Exception $e){
            $alert = array('title' => 'Prijava nije uspjela!', 'content' => 'Već ste se prijavili na ovu akciju.');
        }
        View::share(array(
            'alert' => $alert
        ));
        return View::make('events.index', array('akcije' => Akcije::all()));
    }

    public function getDetalji($id)
    {
        $akcija = Akcije::find($id);
        $broj_prijavljenih = AkcijePrijave::where('id_akcije', '=', $id)->count();
        return View::make('events.detalji', array('akcija' => $akcija, 'broj_prijavljenih' => $broj_prijavljenih));
    }

}