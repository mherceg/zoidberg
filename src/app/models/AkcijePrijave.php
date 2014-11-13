<?php

class AkcijePrijave extends Eloquent {
	protected $table = 'akcije_prijave';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');
}