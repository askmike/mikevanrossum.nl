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
	function getDatesFromItems($array) {
		if(is_array($array)) {
			//we can't use a for each loop because we need to manip the array we're looping
			$len = sizeof($array);
			for($i = 0; $i < $len ; $i++){
				$array[$i]['dutchdate'] = $this->getDutchDate($array[$i]['date']);
			}
		}
		//print_r($array);
		return $array;
	}
	
	
	function getDutchDate($timestamp) {
		
		$month = date('n ',$timestamp);
		$dutchDate = date('j ',$timestamp) . $this->getMonth($month -1) . date(' Y', $timestamp);
		
		return $dutchDate;
	}
	
	function getMonth($number) {
		$allMonths = array('Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December');
		return $allMonths[$number];
	}
}

?>