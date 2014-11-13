<?php

class Akcije extends Eloquent {
	protected $table = 'akcije';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

	public function prijavljeni()
	{
		return $this->hasMany('AkcijePrijave', 'id_akcije');
	}
}