<?php

class ProfileEditorController extends BaseController {

	private $passed_data = array();

	public function getIndex()
	{
		return View::make('admin.edit_profile');
	}

	public function postIndex() {
		$ulaz = Input::all();

		$usr = Auth::user();

		$validator = Validator::make(
			array(
				'email' => $ulaz['mail']
			),
			array(
				'email' => 'required|email|unique:users'
			)
		);

		if($validator->fails()) {
			if($ulaz['mail'] != $usr->email) {
				$this->ispisObavijesti('Adresa e-pošte je obvezna, mora biti u pravilnom obliku i mora biti jedinstvena među korisnicima ministarstva!');
				return $this->getIndex();
			}
		}

		$usr->email = $ulaz['mail'];

		if(!empty($ulaz['pwd1'])) {
			if($ulaz['pwd1'] == $ulaz['pwd2']) {
				$usr->password = Hash::make($ulaz['pwd1']);
			}
		}

		$usr->save();
		$this->ispisObavijesti('Podaci su uspješno promjenjeni!');
			

		return $this->getIndex();
	}

    public function retrivePageTitle() {
        return "Uredi profil";
    }

}
