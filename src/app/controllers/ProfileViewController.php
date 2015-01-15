<?php

class ProfileViewController extends BaseController {

	private $passed_data = array();


	public function getIndex()
	{
		$ulaz = Input::all();		

		if(!isset($ulaz['uid'])) return Redirect::to('/popis_djelatnika');
		
		$usr = User::find($ulaz['uid']);
		if($usr == null) {
			return Redirect::to('/popis_djelatnika');
		}

		View::share(array(
			'djel' => $usr
		));

		return View::make("pregledDjelatnika");
	}

    public function retrivePageTitle() {
        return "Pregled djelatnika";
    }

	public function postIndex() {
		return $this->getIndex();
	}

}
