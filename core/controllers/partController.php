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
				$array[$i]['humandate'] = $this->getHumanDate($array[$i]['date']);
			}
		}
		return $array;
	}
	
	function getDatesFromItem($array) {
		if(is_array($array)) {
			$array['humandate'] = $this->getHumanDate($array['date']);
		}
		return $array;
	}
	
	
	function getHumanDate($timestamp) {
		
		// $month = date('n ',$timestamp);
		// $dutchDate = date('j ',$timestamp) . $this->getMonth($month -1) . date(' Y', $timestamp);
		// return $dutchDate;
		
		// if its this year, skip the year
		if(date('Y', $timestamp) == date('Y', time())) {
			return date('F j\t\h', $timestamp);
		}
		
		return date('F j\t\h &#96;y', $timestamp);
	}
	
	// function getMonth($number) {
	// 	if($number < 0) $number += 12;
	// 	
	// 	$allMonths = array('Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December');
	// 	return $allMonths[$number];
	// }
}

?>
