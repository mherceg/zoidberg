<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public function news() {
        return $this->hasMany('Vijesti', 'autor_id');
    }

    public function primljenePoruke() {
    	return $this->hasMany('PrivatnePoruke', 'reciever_id');
    }

    public function dobijTituluTipa() {
    	return Tipovi::where('id', '=', $this->tip)->get()->first()->titula;
    }

    public function dobijOvlast($modul) {
    	$naziv = Tipovi::where('id', '=', $this->tip)->get()->first()->naziv_tipa;
    	$a = Ovlasti::where('tip_id', '=', $this->tip)->where('modul', '=', $modul)->get();
    	if($a->isEmpty()) return "ne";
    	return Ovlasti::where('tip_id', '=', $this->tip)->where('modul', '=', $modul)->get()->first()->ovlast;
    }

}
