<?php 


class PrivatnePoruke extends Eloquent {
	protected $table = 'privatne_poruke';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('id', 'password', 'sender_id', 'reciever_id', 'naslov', 'sadrzaj', 'vrijeme');

	public function sender() {
     	return $this->belongsTo('User', 'sender_id');
    }

	public function reciever() {
     	return $this->belongsTo('User', 'reciever_id');
    }
}