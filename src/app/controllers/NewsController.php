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

        $user_id = 0;

        if(Auth::id() == null) {
            $user_id = $user['id'];
        }
        else
        {
            $user_id = Auth::id();
        }

        Vijesti::create(array(
            // TODO fill with active user id
            'autor_id' => $user_id,
            'objavljeno' => true,
            'naslov' => $forma['naslov'],
            'sadrzaj' => $forma['sadrzaj'],
            'datum' => new DateTime()
        ));

        return Redirect::to('/home');
    }
}