<?php


class InfoController extends BaseController
{

    public function getIndex()
    {
        $podaci = OsnovniPodaci::all()->first();
        return View::make('info.index', array("podaci" => $podaci));
    }

    public function getPageTitle()
    {
        return "Osnovni podaci";
    }
}