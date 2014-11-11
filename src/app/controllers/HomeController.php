<?php

class HomeController extends BaseController {

	private $passed_data = array();

    public function getPageTitle() {
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

}
