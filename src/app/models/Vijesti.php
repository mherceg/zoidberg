<?php

class Vijesti extends Eloquent {
	protected $table = 'vijesti';
	public $timestamps = false;

    public function autor(){
        return $this->belongsTo('User', 'autor_id');
    }
}