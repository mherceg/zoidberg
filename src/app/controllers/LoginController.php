<?php

class LoginController extends BaseController {

	public function getIndex()
	{
		return View::make('login');
	}

    public function retrivePageTitle() {
        return "Login";
    }

	public function postIndex() {
		$ulaz = Input::all();

		$b = User::where('email', "=", $ulaz['email'])->get();

		if(!$b->isEmpty()) {
			$ak = $b->first()->aktiviran;
			if($ak == 0) {
				$alert = array(
					'title' => "Prijava neuspjela!",
					'content' => "Korisnik nije aktiviran! Obratite se administratoru."
				);
				View::share(array(
						'alert' => $alert
					));
				return View::make('login');
			}
		}

		$cred = array(
			'email' => $ulaz['email'],
			'password' => $ulaz['password']
		);

		$alert = array();

		if(Auth::attempt($cred)) {
			$alert = array(
				'title' => "Prijava uspjela!",
				'content' => "Vaša prijava je uspješno obavljena!"
			);
		}
		else {
			$alert = array(
				'title' => "Prijava neuspjela!",
				'content' => "Upisani podaci nisu valjani!"
			);
			View::share(array(
					'alert' => $alert
				));
			return View::make('login');
		}

		return Redirect::to('/home')->with('alert', $alert);
	}
}
