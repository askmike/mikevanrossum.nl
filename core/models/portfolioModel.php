<?php

class PortfolioModel extends DBmodel {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
	}
	
	public function getPortfolio() {
		
		$members = $this->connection->query('SELECT * FROM portfolio ORDER BY id DESC');
		
		return $this->assocResults($members);
	}
	
	
}
?>