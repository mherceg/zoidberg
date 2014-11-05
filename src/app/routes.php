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

Route::get('/tu', function() {
	$d = new Djelatnik();
	$d['imeDjelatnik'] = "Testko";
	$d['prezimeDjelatnik'] = "Tesković";
	$d['titulaDjelatnik'] = "Predcjednik doktor svemirski pionir";
	$d['emailDjelatnik'] = "pionir@svemir.all";
	$d['lozinkaDjelatnik'] = "123456789";
	$d['dozvolaPristupa'] = 0;
	$d['funkcijaDjelatnik'] = "Time Lord";
//	$d->save();

	return "Not saved";
});


Route::get('/testlogin', function() {
	$cred = array(
		'emailDjelatnik' => "pionir@svemir.all",
		'password' => "123456789"
	);

	$a = "15";

	if(Auth::validate($cred))
        $a = "20";

	return $a;
});


Route::get('/main', function() {
	return View::make('main');
});

Route::get('/home', function() {
	return View::make('home');
});

Route::get('/', function()
{
	return View::make('hello');
});
