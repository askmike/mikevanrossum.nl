<?php

class PortfolioModel extends DBmodel {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	public function getPortfolio() {
		
		return $this->query('SELECT * FROM portfolio ORDER BY id DESC');
	
	}
	
	
}
?>