<?php

class PopisController extends BaseController {

	private $passed_data = array();

	public function getIndex()
	{
		View::share(array(
			'djelatnici' => User::all()
		));
		return View::make('djelatinici');
	}

	public function postIndex() {
		return $this->getIndex();
	}

    public function retrivePageTitle() {
        return "Popis djelatnika";
    }

}
