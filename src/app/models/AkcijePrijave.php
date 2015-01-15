<?php

class AkcijePrijave extends Eloquent {
	protected $table = 'akcije_prijave';
	public $timestamps = false;

	public function akcija(){
		return $this->belongsTo('Akcije', 'id_akcije');
	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');
}