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
		
		$data = $this->AddDatesToPortfolio($data);
		
		
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
	function AddDatesToPortfolio($array) {
		if(is_array($array)) {
			foreach ($array as $value) {
				if(is_array($value)) {
					$month = date('n ',$value['date']);
					$value['dutchdate'] = date('j ',$value['date']) . $this->getMonth($month -1) . date(' Y',$value['date']);
					$newArr[] = $value;
				}
			}
		} 
		return $newArr ? $newArr : $array;
	}
	
	function getMonth($number) {
		$allMonths = array('Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December');
		return $allMonths[$number];
	}
}

?>