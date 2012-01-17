<?php

class AnalyticsModel extends DBmodel {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	//
	
	public function getPostAnalytics($url, $limit) {
		//this function uses URL input so we need to prepare
		
		//debugging
		// $url = 'portfolio';
		
		//this statement get's all steps with different PHP sessions (trackingID's)
		$statement = $this->connection->prepare('SELECT DISTINCT `trackingID`, `time` FROM step WHERE `page` = ? AND `time` > ? GROUP BY `trackingID`');
		
		// $statement = $this->connection->prepare('SELECT DISTINCT `trackingID`, time AS total FROM step WHERE `page` = ? AND `time` > ?');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('ss', $url, $limit);

		# Voer het SQL statement uit
		$statement->execute();
		
		$statement->bind_result($id, $time);
		
		$i = 0;
		while ($statement->fetch()) {
			$array[$i] =  array(
				'id' => $id, 
				'time' => $time
				);
				$i++;
		}
		
		return $array;
		
		
	}
}
?>