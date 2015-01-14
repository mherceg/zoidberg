<?php

class Direktoriji extends Eloquent {
	protected $table = 'direktoriji';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

	public function dobijCijeliPath() {
		$par = $this->root;
		$path = array();
		$c = 0;

		$currFolder = $this;

		$path[$c] = $this->naziv;

		while($par != -1) {
			$par = $currFolder->root;
			if($par != -1) {
				$r = Direktoriji::find($par); //znam...
				$c = $c+1;
				$path[$c] = $r->naziv;
				$currFolder = $r;
			}
		}
		$path = array_reverse($path);

		return implode("/", $path);
	}
}