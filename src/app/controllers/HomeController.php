<?php

class HomeController extends BaseController {

	private $passed_data = array();

    public function retrivePageTitle() {
        return "Home";
    }

	public function getIndex()
	{
		return View::make('home', array(
            'vijesti' => Vijesti::orderBy('datum', 'desc')->get()
        ));
	}

	public function postIndex() {
		return $this->getIndex();
	}

	public function getPovijest()
	{
		$op = OsnovniPodaci::first();
		View::share(array(
			'povijest' => $op->povijest
		));
		return View::make('povijest');
	}

}
