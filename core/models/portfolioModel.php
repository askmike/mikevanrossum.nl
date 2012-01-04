<?php

require MODELS . 'dbmodel.php';

class PortfolioModel extends DBmodel {
	
	
	
	public function getPortfolio() {
		
		$members = $this->connection->query('SELECT * FROM portfolio ORDER BY id DESC');
		
		return $this->assocResults($members);
	}
	
	
}
?>