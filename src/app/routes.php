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


Route::get('/main', function() {
	return View::make('main');
});

/*
Route::get('/home', function() {
	return View::make('home');
});*/

Route::get('/', function()
{
	return View::make('hello');
});
