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

	public function getPorukeAdministracija()
	{
		//return var_dump(Auth::user()->primljenePoruke);
		View::share(
			array(
				'pmovi' => Auth::user()->primljenePoruke()->orderBy('vrijeme', 'desc')->get()	

		));

		return View::make('admin.pm_interno');
	}

	public function getPorukeAdministracijaPosalji()
	{
		$kor = User::all();

		View::share(
			array(
				'korisnici' => $kor
			)
		);
		return View::make('admin.pm_interno_slanje');
	}

	public function postPorukeAdministracijaPosalji()
	{
		$ulaz = Input::all();

		if(!isset($ulaz['korisnici'])) {

			View::share(array(
				'poruka' => 'GREŠKA! Poruka mora biti poslana barem jednom korisniku!'
			));
			return $this->getPorukeAdministracijaPosalji();
		}

		if(!isset($ulaz['naslov'])) {

			View::share(array(
				'poruka' => 'GREŠKA! Poruka mora imati naslov!'
			));
			return $this->getPorukeAdministracijaPosalji();
		}

		if(!isset($ulaz['poruka'])) {

			View::share(array(
				'poruka' => 'GREŠKA! Niste napisali nikakvu poruku!'
			));
			return $this->getPorukeAdministracijaPosalji();
		}



		$sender = $ulaz['sid'];
		$nas = $ulaz['naslov'];
		$por = $ulaz['poruka'];
		$kor = $ulaz['korisnici'];
		$file = $ulaz['fileToUpload'];

		if($file != null) {
			$ime = (new DateTime())->format('Y-m-d-H-i-s').'-'.$sender.'-'.$file->getClientOriginalName();
			$file = $file->move('public//poruke_uploads', $ime);
		}

		foreach($kor as $k) {
			$npor = new PrivatnePoruke();

			$npor->sender_id = $sender;
			$npor->reciever_id = $k;
			$npor->naslov = $nas;
			$npor->sadrzaj = $por;
			$npor->vrijeme = new DateTime();
			if($file != null) {
				$npor->privitak_lokacija = 'poruke_uploads/'.$ime;
			}
			$npor->save();
		}
		View::share(array(
			'poruka' => 'Poruka je uspješno poslana!'
		));
		return $this->getPorukeAdministracijaPosalji();
	}

	public function getPreuzmiPrivitak()
	{
		$ulaz = Input::all();
		$naziv = $ulaz['n'];

        $file= public_path(). "/poruke_uploads/".$naziv;
        $headers = array(
              'Content-Type' => 'application/pdf',
            );
        return Response::download($file, $naziv, $headers);

		return $naziv;
	}

	public function getKorisniciDodaj()
	{
		return View::make('admin.adduser');
	}

	public function postKorisniciDodaj()
	{
		$aa = Input::all();
		return var_dump($aa);
	}

	public function getOvlasti() {

		return View::make('admin.ovlasti');
	}

	public function postOvlasti() {
		$ulaz = Input::all();

		if($ulaz['tip'] == 'sub') {
			$t = new Ovlasti();
			$t->tip_id = Tipovi::where('naziv_tipa', '=', $ulaz['ime'])->first()->id;
			$t->modul = $ulaz['oznaka'];
			$t->ovlast = $ulaz['ovlast'];
			$t->save();
			$this->ispisObavijesti('Ova ovlast je dodana!');
		}
		else if($ulaz['tip'] == 'nov') {
			$noviTip = new Tipovi();

			$noviTip->naziv_tipa = $ulaz['nazivNovi'];
			$noviTip->d_dozvola_def = $ulaz['defDoz'];
			$noviTip->titula = $ulaz['titula'];
			$noviTip->save();

			$this->ispisObavijesti('Novi tip je uspješno dodan!');
		}
		return $this->getOvlasti();
	}

	private function ispisObavijesti($por) {
		View::share(array(
			'poruka' => $por
		));
	}
}
