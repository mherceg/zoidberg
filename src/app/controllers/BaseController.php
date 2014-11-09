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
        $op = OsnovniPodaci::find(1);
        $data = array(
            'ministarstvo' => $op->naziv,
            'podnaziv' => $op->podnaziv,
            'title' => $this->getPageTitle()
        );
        View::share($data);
    }

    abstract public function getPageTitle();

}
