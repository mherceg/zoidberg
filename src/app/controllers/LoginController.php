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
		return var_dump(Input::all());
	}

}
