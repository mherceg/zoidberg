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

        AkcijePrijave::insert(array(
            'id_akcije'=>$id_akcije,
            'ime' => $ime,
            'prezime' => $prezime,
            'email' => $email,
            'oib' => $oib,
            'vrijeme' => time()
        ));
    }

    public function getDetalji($id){
        $akcija = Akcije::find($id);
        return View::make('events.detalji', array('akcija' => $akcija));
    }

}