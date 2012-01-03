<?php

class Controller {
	//create public vars for the loader, the model and the request
	public $load;
	public $model;
	public $request;
	
	function __construct() {
		//require stuff
		include APP . 'load.php';
		//instanciate load
		$this->load = new Load();
		
		$this->getPage('home');
	}
	
	function getPage($view, $data = null) {  
		//if multiple functions need the menu
		
		$this->load->view('header',$data);
		$this->load->view($view, $data);
		$this->load->view('footer');
	}
	
	
	function __destruct() {
		//kill the DB connection
		$this->model = NULL;
	}
	
	//following 3 functions transform timestamp to dutch dates 
	function AddDatesToEvents($array) {
		if(is_array($array)) {
			foreach ($array as $value) {
				//extract the date from timestamp
				$date = getdate($value['eventdate']);
				//extract month and day from $date
				$month = $date['mon'];
				$day = $date['mday'];
				//set month (-1 because $allMonths starts at 0)
				$value['month'] = $this->getMonth($month - 1);
				$value['day'] = $day;
				$value['year'] = $date['year'];
				//store everything in new array
				$newArr[] = $value;
			}
		} 
		return $newArr ? $newArr : $array;
	}
	
	function AddDateToEvent($event) {
		$month = date('n ',$event['eventdate']);
		$date = date('j ',$event['eventdate']) . $this->getMonth($month -1) . date(' Y',$event['eventdate']);
		return $date;
	}
	
	function getMonth($number) {
		$allMonths = array('Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December');
		return $allMonths[$number];
	}
}

?>