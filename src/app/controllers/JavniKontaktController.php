<?php

class JavniKontaktController extends BaseController {

	private $passed_data = array();

	public function getIndex()
	{
		View::share(array(
			'kat' => VPKat::all()
		));
		return View::make('javni_kontakt');
	}

	public function postIndex() {
		$ulaz = Input::all();

		$validator = Validator::make(
			array('email' => $ulaz['mail']),
			array('email' => 'required|email')
		);

		if($validator->fails()) {
			$alert['title'] = "Greška!";
			$alert['content'] = "Upisana adresa e-pošte nije važeća!";

			View::share(array(
				'alert' => $alert
			));

			return $this->getIndex();
		}

		if(empty($ulaz['sadrzaj'])) {
			$alert['title'] = "Greška!";
			$alert['content'] = "Poruka mora imati sadržaj!";

			View::share(array(
				'alert' => $alert
			));

			return $this->getIndex();	
		}

		$t = new VanjskePoruke();

		$t->naslov = $ulaz['naslov'];
		$t->kat_id = $ulaz['kateg'];
		$t->sadrzaj = $ulaz['sadrzaj'];
		$t->vrijeme = new DateTime();
		$t->sender_mail = $ulaz['mail'];

		if(empty($ulaz['naslov'])) $t->naslov = "<bez_naslova>";

		$t->save();

		$alert = array();

		$alert['title'] = "Uspjeh!";
		$alert['content'] = "Vaša poruka je uspješno poslana!";

		View::share(array(
			'alert' => $alert
		));

		return $this->getIndex();
	}

	public function getSpec() {
		$ulaz = Input::all();
		if(!isset($ulaz['uid'])) {
			return Redirect::to('kontakt');
		}

		View::share(array(
			'uid' => $ulaz['uid']
		));
		return View::make('JavniKontakt_spec');
	}

	public function postSpec() {
		$ulaz = Input::all();


		$validator = Validator::make(
			array('email' => $ulaz['mail']),
			array('email' => 'required|email')
		);

		if($validator->fails()) {
			$alert['title'] = "Greška!";
			$alert['content'] = "Upisana adresa e-pošte nije važeća!";
		
			View::share(array(
				'alert' => $alert
			));
		}

		$t = new PrivatnePoruke();
		$t->sender_id = 1;
		$t->reciever_id = $ulaz['uid'];
		$t->naslov = $ulaz['mail'].'-'.$ulaz['naslov'];
		$t->sadrzaj = $ulaz['sadrzaj'];
		$t->vrijeme = new DateTime();
		$t->save();

		$alert['title'] = "Uspjeh!";
		$alert['content'] = "Vaša poruka je uspješno poslana!";
		
		View::share(array(
			'alert' => $alert,
			'uid' => $ulaz['uid']
		));

		return $this->getSpec();
	}

    public function retrivePageTitle() {
        return "Kontakt";
    }

}
