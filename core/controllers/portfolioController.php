<?php

class PortfolioController extends PartController {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		require MODELS . 'portfolioModel.php';
		
		$this->model = new PortfolioModel;
		
		// get main data
		$data = $this->model->getPortfolio();
		
		// overwrite main data with added dates
		
		// note: it would be better to just add the dates over here
		// instead of sending the whole array and getting it back with  
		// the dates added, however I would have to create a date array mapped
		// to the data array.
		
		// possible solution: create a general class that would handle mapping 2 arrays.
		$data = $this->getDatesFromItems($data);
		
		//print_r($part);
		$this->part = $data;
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
}

?>