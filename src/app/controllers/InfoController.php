<?php


class InfoController extends BaseController{

    public function getIndex() {
        return View::make('info.index');
    }

    public function getPageTitle()
    {
        return "Osnovni podaci";
    }
}