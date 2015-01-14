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
			'folderi' => Direktoriji::all()
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
			'folderi' => Direktoriji::all()
		));
		return View::make("admin.files");
	}

	public function postDatoteke()
	{
		$ulaz = Input::all();

		return var_dump($ulaz);

		return $this->getDatoteke();
	}

    public function retrivePageTitle() {
        return "Datoteke";
    }

	public function postIndex() {
		return $this->getIndex();
	}

}
