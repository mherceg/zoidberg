<?php

class ProfileEditorController extends BaseController {

	private $passed_data = array();

	public function getIndex()
	{
		return View::make('admin.edit_profile');
	}

	public function postIndex() {
		return $this->getIndex();
	}

    public function retrivePageTitle() {
        return "Uredi profil";
    }

}
