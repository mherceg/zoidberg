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

	public function djeca() {
		return $this->hasMany('Direktoriji', 'root');
	}

	public function files() {
		return $this->hasMany('Datoteke', 'direktorij');
	}

	public function shouldBeVisible() {

		if($this->hasPublicFiles()) return true;
		$fQ = array();
		$i = 0;

		$fQ[$i] = $this;
		++$i;

		$j = 0;
		while(count($fQ) > $j) {
			$cF = $fQ[$j];

			$currID = $cF->id;

			$djM = Direktoriji::where('root', '=', $currID)->get();

			if(!isset($djM)) continue;
			$djM = $djM->toArray();

			foreach($djM as $dj) {
				$dir = Direktoriji::find($dj['id']);
				if($dir == null) continue;
				if($dir->hasPublicFiles()) return true;
				
				$fQ[$i] = $dir;
				++$i;
			}

			++$j;
		}

		return false;
	}

	public function hasPublicFiles() {
		return Datoteke::where('direktorij', '=', $this->id)->where('potrebna_dozvola', '=', 0)->count() > 0;
	}
}