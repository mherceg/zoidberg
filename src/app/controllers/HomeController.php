<?php

class HomeController extends BaseController {

	private $passed_data = array();

	private function basicData() {
		$op = OsnovniPodaci::find(1);//podnaziv

		$this->passed_data['ministarstvo'] = "$op->naziv";
		$this->passed_data['podnaziv'] = "$op->podnaziv";

		$this->passed_data['title'] = "Home";

	}

	private function premakeCleanup()
	{
		View::share($this->passed_data);	
	}

	public function getIndex()
	{
		$this->basicData();

		$vijesti = Vijesti::orderBy('datum')->get();
		$this->passed_data['vijesti'] = $vijesti;

		$this->premakeCleanup();
		return View::make('home');
	}

	public function postIndex() {
		return $this->getIndex();
	}

}
