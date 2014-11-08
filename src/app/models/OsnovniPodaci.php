<?php

class OsnovniPodaci extends Eloquent {
	protected $table = 'osnovni_podaci';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');
}