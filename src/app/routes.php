<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('/login', 'LoginController');
Route::controller('/home', 'HomeController');
Route::controller('/podaci', 'InfoController');
Route::controller('/vijesti', 'NewsController');
Route::controller('/akcije', 'EventsController');

Route::controller('/admin', 'AdminController');
/*
Route::get('/admin', function() {
	View::share(array(
		'title' => "Admin Panel",
		'ministarstvo' => "wut",
		'emblem' => "test.png"
	));

	return View::make('admin.main');
});*/

Route::get('/', function() {
	return Redirect::to('/home');
});

Route::get('/tu', function() {
	$d = new User();

	$d->email = "pionir@svemir.all";
	$d->password = Hash::make("a");
	$d->ime = "Đuro";
	$d->prezime = "čćžšđ";
	$d->tip = 1;
	$d->funkcija = "Time Lord";
	$d->d_dozvola = -1;
	$d->aktiviran = true;
	try {
		$d->save();
	}
	catch(Exception $e) {
		return var_dump($e);
	}
	return "Saved";
});

Route::get('/logout', function() {
	Auth::logout();
	return Redirect::to('/home');
});


Route::get('/amiloggedin', function() {
	return var_dump(Auth::user());
});


Route::get('/testlogin', function() {

	$b = User::all();

	$cred = array(
		'email' => "pionir@svemir.all",
		'password' => "a"
	);

	$a = "15";

	$a = Auth::once($cred);
        //$a = "20";

	return var_dump($a);
});

View::composer('nav', function($view) {
	$akcije = Akcije::all();
	$akcije->shuffle();
	$akcije = $akcije->take(2);

	$view->with('nav_akcije', $akcije);
});