<?php


class NewsController extends BaseController
{

    public function retrivePageTitle()
    {
        return "Vijesti";
    }

    public function getCreate()
    {
        return View::make('news.create');
    }

    public function postCreate()
    {
        $forma = Input::all();
        $user = User::first();

        Vijesti::create(array(
            // TODO fill with active user id
            'autor_id' => Auth::id(),
            'objavljeno' => true,
            'naslov' => $forma['naslov'],
            'sadrzaj' => $forma['sadrzaj'],
            'datum' => new DateTime()
        ));

        return Redirect::to('/home');
    }
}