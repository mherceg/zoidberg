<?php


namespace PHP;


/**
 * @author Enterprise Architect
 * @version 1.0
 * @created 09-May-2011 5:02:05 PM
 */
class Sample
{
	public $ires = 0;
	
	function __construct()
	{
	}

	function __destruct()
	{
	}



	/**
	 * 
	 * @param two
	 * @param one
	 */
	public function Add( $two,  $one)
	{
		$this->ires = $two + $one;
		print "$two + $one = $this->ires <br>";
		return $this->ires;
	}

	/**
	 * 
	 * @param two
	 * @param one
	 */
	public function Divide( $two,  $one)
	{
		$this->ires = $two / $one;
		print "$two / $one = $this->ires <br>";
		return $this->ires;
	}

	/**
	 * 
	 * @param two
	 * @param one
	 */
	public function Multiply( $two,  $one)
	{
		$this->ires = $two * $one;
		print "$two * $one = $this->ires <br>";
		return $this->ires;
	}

	/**
	 * 
	 * @param two
	 * @param one
	 */
	public function Subtract( $two,  $one)
	{
		//
		$this->ires = $two - $one;
		print "$two - $one = $this->ires <br>";
		return $this->ires;
		//
	}
}

function tests()
{
	print "sample php script begins<br>";
	$p = new Sample();
	
	$i1 = $p->Add(5,5);
	$i2 = $p->Divide(5,5);
	$i3 = $p->Multiply(5,5);
	$i4 = $p->Subtract(5,5);
	print "sample php script ends<br>";
}

tests();

?>