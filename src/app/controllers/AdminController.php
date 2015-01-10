<?php

class AdminController extends BaseController {

	private $passed_data = array();

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => 'login'));
	}

    public function retrivePageTitle() {
        return "Home";
    }

	public function getDashboard()
	{
		return View::make('admin.dashboard');
	}

	public function getOsnovnipodaci()
	{
		View::share(array(
			'op' => OsnovniPodaci::first()
		));
		return View::make('admin.osnovne_informacije');
	}

	public function postOsnovnipodaci()
	{
		$ulaz = Input::all();
		//var_dump($a);

		$podaci = OsnovniPodaci::first();
		$podaci->naziv = $ulaz['naziv'];
		$podaci->podnaziv = $ulaz['podnaziv'];
		$podaci->adresa = $ulaz['adresa'];
		$podaci->telefon = $ulaz['telefon'];
		$podaci->email = $ulaz['email'];
		$podaci->emblem_lokacija = $ulaz['lemb'];
		$podaci->slika_lokacija = $ulaz['lzg'];

		$podaci->save();

		View::share(array(
			'op' => $podaci,
			'poruka' => "Promjene su uspješno spremljene!"
		));
		return View::make('admin.osnovne_informacije');
	}

	public function postIndex() {
		return $this->getIndex();
	}

	public function getVijestiUredi()
	{
		
		return View::make('admin.uredi_vijesti');
	}

	public function getVijestiDodaj()
	{
		return "vijesti-addnew";
	}

}
