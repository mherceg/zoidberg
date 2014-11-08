<?php 


class PrivatnePoruke extends Eloquent {
	rotected $table = 'privatne_poruke';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('id', 'password', 'sender_id', 'reciever_id', 'naslov', 'sadrzaj', 'vrijeme');
}