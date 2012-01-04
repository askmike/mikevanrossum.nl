<?php

class PortfolioController extends PartController {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		require MODELS . 'portfolioModel.php';
		
		$this->model = new portfolioModel;
		
		//get main data
		$part = $this->model->getPortfolio();
		
		//overwrite main data with added dates
		$part = $this->addDatesToItems($part);
		
		//print_r($part);
		$this->part = $part;
		
	}
	
	function __destruct() {
		//this runs the construct of the class this class is extending
		parent::__destruct();
	}
	
}

?>