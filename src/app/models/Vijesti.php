<?php

class Vijesti extends Eloquent {
	protected $table = 'vijesti';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');	
}