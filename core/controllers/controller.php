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
		
		require MODELS . 'portfolioModel.php';
		
		$this->model = new portfolioModel;
		$data = $this->model->getPortfolio();
		
		$data = $this->addDatesToPortfolio($data);
		
		
		$this->getSite('home', $data);
	}
	
	function getSite($view, $data = null) {  
		//if multiple functions need the menu
		
		$this->load->view('header',$data);
		$this->load->view($view, $data);
		$this->load->view('portfolio',$data);
		$this->load->view('blog',$data);
		$this->load->view('footer');
	}
	
	
	function __destruct() {
		//kill the DB connection
		$this->model = NULL;
	}
	
	//following 3 functions transform timestamp to dutch dates 
	function addDatesToPortfolio($array) {
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