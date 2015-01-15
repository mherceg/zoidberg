<?php

class ViewFilesController extends BaseController {

	private $passed_data = array();


	public function getIndex()
	{
		$ulaz = Input::all();

		if(!isset($ulaz['fid'])) {
			return Redirect::to('/dokumenti?fid=0');
		}

		$currF = Direktoriji::find($ulaz['fid']);

		$ovlast = 0;

        if(Auth::check()) {
            $ovlast = Auth::user()->d_dozvola;
        }

		View::share(array(
			'currF' => $currF,
			'ovlastUsera' => $ovlast
		));

		return View::make("files");
	}

    public function retrivePageTitle() {
        return "Datoteke";
    }

	public function postIndex() {
		return $this->getIndex();
	}

}
