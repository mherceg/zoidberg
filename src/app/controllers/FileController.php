<?php

class FileController extends BaseController {

	private $passed_data = array();

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => 'login'));
	}


	public function getIndex()
	{
		return Redirect::to("/admin/dashboard");
	}

	public function getDirektorij() {

		View::share(array(
			'folderi' => Direktoriji::all()->sortBy('naziv')
		));
		return View::make("admin.folder");
	}

	public function postDirektorij() {
		$ulaz = Input::all();

		if(empty($ulaz['naziv'])) {
			$this->ispisObavijesti('Direktorij mora imati naziv!');
			return $this->getDirektorij();
		}

		if(Direktoriji::where('naziv', '=', $ulaz['naziv'])->where('root', '=', $ulaz['roditelj'])->count() > 0 ) {
			$this->ispisObavijesti('Ne mogu postojati dva direktorija istog imena u istom direktoriju!');
			return $this->getDirektorij();
		}

		$t = new Direktoriji();
		$t->naziv = $ulaz['naziv'];
		$t->root = $ulaz['roditelj'];
		$t->save();

		$this->ispisObavijesti('Direktorij je uspješno dodan!');
		return $this->getDirektorij();
	}

	public function getDatoteke()
	{

		View::share(array(
			'folderi' => Direktoriji::all()->sortBy('naziv')
		));
		return View::make("admin.files");
	}

	public function postDatoteke()
	{
		$ulaz = Input::all();

		$file = $ulaz['fileToUpload'];
		$path = explode("|", $ulaz['roditelj'])[1];
		$pid = explode("|", $ulaz['roditelj'])[0];

		$path = substr($path, 1);

//		return var_dump($ulaz);
		if(!isset($ulaz['fileToUpload']) || $ulaz['fileToUpload'] == null) {
			$this->ispisObavijesti("GREŠKA: Datoteka nije uploadana!");
			return $this->getDatoteke();
		}
		else {
			$ime = $file->getClientOriginalName();
			$file = $file->move('public/datoteke'.$path.'/', $ime);

			$t = new Datoteke();

			if(Datoteke::where('naziv', '=', $ime)->where('direktorij', '=', $pid)->count()) {
				$t = Datoteke::where('naziv', '=', $ime)->where('direktorij', '=', $pid)->get()->first();
				$this->ispisObavijesti("Datoteka \"".$ime."\" je uspješno ažurirana!");
			}
			else 
			$this->ispisObavijesti("Datoteka \"".$ime."\" je uspješno postavljena!");

			$t->direktorij = $pid;
			$t->naziv = $ime;
			$t->lokacija = 'datoteke'.$path;
			$t->potrebna_dozvola = $ulaz['tajnost'];
			$t->save();

		}

		return $this->getDatoteke();
	}

    public function retrivePageTitle() {
        return "Datoteke";
    }

	public function postIndex() {
		return $this->getIndex();
	}

}
