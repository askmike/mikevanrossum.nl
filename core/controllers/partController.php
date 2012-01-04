<?php

class PartController extends Controller {
	
	public $part;
	
	function __construct() {
		
		//this runs the construct of the class this class is extending
		parent::__construct();
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	//following functions transform timestamp to dutch dates 
	function addDatesToItems($array) {
		if(is_array($array)) {
			foreach ($array as $value) {
				$value = $this->addDutchDate($value, 'date', 'dutchdate');
				$newArr[] = $value;
			}
		} 
		return $newArr ? $newArr : $array;
	}
	
	
	function addDutchDate($array, $timestamp, $name) {
		if(is_array($array)) {
			$month = date('n ',$array[$timestamp]);
			$array[$name] = date('j ',$array[$timestamp]) . $this->getMonth($month -1) . date(' Y',$array[$timestamp]);
		}
		return $array;
	}
	
	function getMonth($number) {
		$allMonths = array('Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December');
		return $allMonths[$number];
	}
}

?>