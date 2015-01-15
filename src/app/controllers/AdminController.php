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
        return "Administracija";
    }

	public function getDashboard()
	{
		View::share(array(
			'eventi' => Akcije::orderBy('id', 'desc')->take(10)->get(),
			'vijestiDash' => Vijesti::orderBy('datum', 'desc')->take(10)->get()
		));
		return View::make('admin.dashboard');
	}

	public function getOsnovnipodaci()
	{
		if(Auth::user()->dobijOvlast('editmin') != "da") {
			return Redirect::to("admin/dashboard");
		}
		View::share(array(
			'op' => OsnovniPodaci::first()
		));
		return View::make('admin.osnovne_informacije');
	}

	public function postOsnovnipodaci()
	{
		if(Auth::user()->dobijOvlast('editmin') != "da") {
			return Redirect::to("admin/dashboard");
		}
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
		return Redirect::to($redir)->with('poruka', "Vijest je uspješno spremljena!");
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

		if(Auth::user()->dobijOvlast('editmin') != "da") {
			return Redirect::to("admin/dashboard");
		}

		$op = OsnovniPodaci::first();
		View::share(array(
			'povijest' => $op->povijest
		));
		return View::make('admin.povijest');
	}

	public function postPovijest() {

		if(Auth::user()->dobijOvlast('editmin') != "da") {
			return Redirect::to("admin/dashboard");
		}
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

	public function getAkcijeUredi($actionId = null)
	{

		if(Auth::user()->dobijOvlast('akcije') != "da") {
			return Redirect::to("admin/dashboard");
		}

		View::share(array(
			'akcije' => Akcije::all()
		));

		return View::make('admin.uredi_akcije');
	}

	private function getAkcijeUrediDetail($actionId) {
		die("TODO: uredi akciju $actionId");
	}

	public function getAkcijeDodaj()
	{
		if(Auth::user()->dobijOvlast('akcije') != "da") {
			return Redirect::to("admin/dashboard");
		}
		$ulaz = Input::all();
		$id = -1;
		if(isset($ulaz['id']))
			$id = $ulaz['id'];

		$akcija = Akcije::find($id);
		if($akcija == null) {
			View::share(array(
				'naziv' => "",
				'opis' => "",
				'max_ljudi' => "",
				'id' => -1
			));
		}
		else {
			View::share(array(
				'naziv' => $akcija->naziv,
				'opis' => $akcija->opis,
				'max_ljudi' => $akcija->max_ljudi,
				'id' => $akcija->id
			));
		}

		return View::make('admin.editor_akcije');
	}

	public function postAkcijeDodaj()
	{
		if(Auth::user()->dobijOvlast('akcije') != "da") {
			return Redirect::to("admin/dashboard");
		}
		$ulaz = Input::all();
		$akcija = null;
		if($ulaz['id'] != -1) {
			$akcija = Akcije::find($ulaz['id']);
			$akcija->naziv = $ulaz['naziv'];
			$akcija->opis = $ulaz['opis'];
			$akcija->max_ljudi = $ulaz['max_ljudi'];
			$akcija->save();
		}
		else {
			$akcija = new Akcije();
			$akcija->naziv = $ulaz['naziv'];
			$akcija->opis = $ulaz['opis'];
			$akcija->max_ljudi = $ulaz['max_ljudi'];
			$akcija->save();
		}

		$redir = '/admin/akcije-dodaj?id='.$akcija->id;
		return Redirect::to($redir)->with('poruka', "Akcija je uspješno spremljena!");
	}

	public function getPrijave($id){
		return View::make('admin.prijave', array(
			'prijave' => Akcije::find($id)->prijavljeni
		));
	}

	public function getKorisniciDodaj()
	{

		if(Auth::user()->dobijOvlast('usermod') != "da") {
			return Redirect::to("admin/dashboard");
		}
		View::share(array(
			'tpp' => Tipovi::all()
		));
		return View::make('admin.adduser');
	}

	public function postKorisniciDodaj()
	{

		if(Auth::user()->dobijOvlast('usermod') != "da") {
			return Redirect::to("admin/dashboard");
		}
		$ulaz = Input::all();

		if($ulaz['pwd1'] != $ulaz['pwd2']) {
			$this->ispisObavijesti('Lozinke nisu jednke!');
		}
		else if(empty($ulaz['mail']) || empty($ulaz['ime']) || empty($ulaz['prezime']) || empty($ulaz['pwd1']) || empty($ulaz['uloga']) || empty($ulaz['funkcija'] || empty($ulaz['oib']))) {
			$this->ispisObavijesti("Sva polja je potrebno ispuniti!");
		}
		else {
			$t = new User();

			$t->email = $ulaz['mail'];
			$t->password = Hash::make($ulaz['pwd1']);
			$t->ime = $ulaz['ime'];
			$t->prezime = $ulaz['prezime'];
			$t->tip = $ulaz['uloga'];
			$t->funkcija = $ulaz['funkcija'];
			$t->aktiviran = '1';
			$t->oib = $ulaz['oib'];
			$t->d_dozvola = Tipovi::where('id', '=', $ulaz['uloga'])->first()->d_dozvola_def;
			
			$t->save();

			$this->ispisObavijesti('Dodan je novi korisnik!');
		}

		View::share(array(
			'tpp' => Tipovi::all()
		));
		return View::make('admin.adduser');
	}

	public function getOvlasti() 
	{
		if(Auth::user()->dobijOvlast('editovlast') != "da") {
			return Redirect::to("admin/dashboard");
		}
		return View::make('admin.ovlasti');
	}

	public function postOvlasti() {

		if(Auth::user()->dobijOvlast('editovlast') != "da") {
			return Redirect::to("admin/dashboard");
		}
		$ulaz = Input::all();

		if($ulaz['tip'] == 'sub') {
			$t = new Ovlasti();
			if(Tipovi::where('naziv_tipa', '=', $ulaz['ime'])->get()->isEmpty()) {
				$this->ispisObavijesti('Ne postoji tip korisnika nad kojim se želi dodati ovlast!');
				return $this->getOvlasti();
			}

			if(Ovlasti::where('tip_id', '=', Tipovi::where('naziv_tipa', '=', $ulaz['ime'])->first()->id)
				->where('modul', '=', $ulaz['oznaka'])->count() > 0) {
				$t = Ovlasti::where('tip_id', '=', Tipovi::where('naziv_tipa', '=', $ulaz['ime'])->first()->id)
				->where('modul', '=', $ulaz['oznaka'])->get()->first();
			} 
			$t->tip_id = Tipovi::where('naziv_tipa', '=', $ulaz['ime'])->first()->id;
			$t->modul = $ulaz['oznaka'];
			$t->ovlast = $ulaz['ovlast'];
			$t->save();
			$this->ispisObavijesti('Ovlast je uspješno ažurirana!');
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
/*
	private function ispisObavijesti($por) {
		View::share(array(
			'poruka' => $por
		));
	}*/

	public function getKorisniciUredi() {

		if(Auth::user()->dobijOvlast('usermod') != "da") {
			return Redirect::to("admin/dashboard");
		}
		$ulaz = Input::all();

		$users = User::all();

		View::share(array(
			'tpp' => Tipovi::all()
		));

		if(isset($ulaz['uid'])) {
			$usr = User::find($ulaz['uid']);
			if($usr != null) {
				View::share(array(
					'usr' => $usr
				));
			}
			else {
				$this->ispisObavijesti("Korisnik sa zadanim IDom ne postoji!");
			}
		}

		View::share(array(
			'kor' => $users
		));

		return View::make('admin.edit_user');
	}


	public function postKorisniciUredi() {

		if(Auth::user()->dobijOvlast('usermod') != "da") {
			return Redirect::to("admin/dashboard");
		}
		$ulaz = Input::all();


		$aktivi = 0;
		if(isset($ulaz['aktv'])) {
			$aktivi = 1;
		}

		$t = User::find($ulaz['userID']);

		$t->email = $ulaz['mail'];
		$t->ime = $ulaz['ime'];
		$t->prezime = $ulaz['prez'];
		$t->funkcija = $ulaz['funk'];
		$t->aktiviran = $aktivi;
		$t->oib = $ulaz['oib'];
		$t->d_dozvola = $ulaz['ddoz'];
		$t->tip = $ulaz['uloga'];

		$t->save();

		$this->ispisObavijesti('Informacije su uspješno promjenjene!');

		View::share(array(
			'tpp' => Tipovi::all(),
			'usr' => User::find($ulaz['userID']),
			'kor' => User::all()
		));

		return View::make('admin.edit_user');
	}

	public function getPorukeGradjani() {

		if(Auth::user()->dobijOvlast('pubpm') != "da") {
			return Redirect::to("admin/dashboard");
		}
		View::share(array(
			'pmovi' => VanjskePoruke::take(50)->get()
		));
		return View::make('admin.vp_pregled');
	}

	public function postPorukeGradjani() {

		if(Auth::user()->dobijOvlast('pubpm') != "da") {
			return Redirect::to("admin/dashboard");
		}
		
		$ulaz = Input::all();

		if(isset($ulaz['novaKat'])) {
			if(!empty($ulaz['novaKat'])) {
				$t = new VPKat();
				$t->naziv = $ulaz['novaKat'];
				$t->save();
			}
		}
		$this->ispisObavijesti("Nova kategorija je uspješno dodana!");
		return $this->getPorukeGradjani();
	}
}
