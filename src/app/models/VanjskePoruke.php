<?php

class VanjskePoruke extends Eloquent {
	protected $table = 'vanjske_poruke';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');
}