<?php

class AdminController extends BaseController {

	private $passed_data = array();

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => 'login'));
	}

	public function getIndex()
	{
		return Redirect::to('/admin/dashboard');
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
		$vijesti = Auth::user()->news();
		View::share(array(
			'vijesti' => Auth::user()->news()->orderBy('datum', 'desc')->get()
		));
	
		return View::make('admin.uredi_vijesti');
	}

	public function getVijestiDodaj()
	{
		$ulaz = Input::all();
		$vijest_id = -1;
		if(isset($ulaz['id']))
			$vijest_id = $ulaz['id'];

		$vijest = Vijesti::find($vijest_id);
		if($vijest == null) {
			View::share(array(
				'naslov' => "",
				'sadrzaj' => "",
				'vijest_id' => -1
			));
		}
		else {
			View::share(array(
				'naslov' => $vijest->naslov,
				'sadrzaj' => $vijest->sadrzaj,
				'vijest_id' => $vijest_id
			));
		}

		return View::make('admin.editor_vijesti');
	}

	public function postVijestiDodaj()
	{
		$ulaz = Input::all();
		$v = null;
		if($ulaz['vid'] != -1) {
			$v = Vijesti::find($ulaz['vid']);
			$v->naslov = $ulaz['naslov'];
			$v->sadrzaj = $ulaz['sadrzaj'];
			$v->objavljeno = $ulaz['objavi'];
			$v->save();
		}
		else {
			$v = new Vijesti();
			$v->autor_id = Auth::id();
			$v->objavljeno = $ulaz['objavi'];
			$v->naslov = $ulaz['naslov'];
			$v->sadrzaj = $ulaz['sadrzaj'];
			$v->datum = new DateTime();
			$v->save();
		}
		$redir = '/admin/vijesti-dodaj?id='.$v->id;
		return Redirect::to($redir);
	}

	public function getObjavi()
	{
		$ulaz = Input::all();
		$v = Vijesti::find($ulaz['id']);
		$v->objavljeno = 1;
		$v->save();
		return Redirect::to('/admin/vijesti-uredi');
	}

	public function getSakrij()
	{
		$ulaz = Input::all();
		$v = Vijesti::find($ulaz['id']);
		$v->objavljeno = 0;
		$v->save();
		return Redirect::to('/admin/vijesti-uredi');
	}

	public function getPovijest() {
		$op = OsnovniPodaci::first();
		View::share(array(
			'povijest' => $op->povijest
		));
		return View::make('admin.povijest');
	}

	public function postPovijest() {
		$op = OsnovniPodaci::first();
		$ulaz = Input::all();
		$op['povijest'] = $ulaz['povijest'];
		$op->save();
		View::share(array(
			'poruka' => "Promjene su uspješno spremljene!"
		));
		return $this->getPovijest();
	}

}
