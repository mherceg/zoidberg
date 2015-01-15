<?php

abstract class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
        $this->loadBasicData();
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    private function loadBasicData() {
        $op = OsnovniPodaci::first();
        $poruke = null;

        if(Auth::check()) {
        	$poruke = PrivatnePoruke::where('reciever_id', '=', Auth::id())->orderBy('vrijeme', 'desc')->take(3)->get();
        }

        $data = array(
            'ministarstvo' => $op->naziv,
            'podnaziv' => $op->podnaziv,
            'title' => $this->retrivePageTitle(),
            'emblem' => $op->emblem_lokacija,
            'pm_topbar' => $poruke
        );

        View::share($data);
    }

    public function ispisObavijesti($por) {
        View::share(array(
            'poruka' => $por
        ));
    }

    abstract public function retrivePageTitle();

}
