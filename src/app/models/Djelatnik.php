<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Djelatnik extends Eloquent implements UserInterface {
	protected $table = 'djelatnik';
	public $timestamps = false;

	protected $hidden = array('password');

	public function getAuthIdentifier()
	{
	    return getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
	    return $this['lozinkaDjelatnik'];
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */

public function getRememberToken()
{
    return $this->remember_token;
}

public function setRememberToken($value)
{
    $this->remember_token = $value;
}

public function getRememberTokenName()
{
    return 'remember_token';
}
}

?>