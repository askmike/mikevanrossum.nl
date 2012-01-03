<?php

require MODELS . 'dbmodel.php';

class PortfolioModel extends DBmodel {
	
	
	
	public function getPortfolio() {
		//get events from DB
		$members = $this->connection->query('SELECT * FROM portfolio ORDER BY id DESC');
		
		//store events in an array
		while ($row = $members->fetch_assoc()) {
			$rows[] = $row;
		}
		//return the array
		return $rows;
	}
	
	
}
?>