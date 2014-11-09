<?php


class InfoController extends BaseController{

    public function index() {
        return View::make('info.index');
    }

    public function getPageTitle()
    {
        return "Osnovni podaci";
    }
}