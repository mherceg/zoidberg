<?php

class Vijesti extends Eloquent {
	protected $table = 'vijesti';
    protected $fillable = array('autor_id', 'objavljeno', 'naslov', 'sadrzaj', 'datum');
    public $timestamps = false;

    public function autor(){
        return $this->belongsTo('User', 'autor_id');
    }
}