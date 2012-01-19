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
	
	public function getPostVisits($url, $limit) {
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
		
		// temp: from 12/01 untill 17/01 the website has moved from /mvr2/ to /
		// the code below appends /mvr2/ to the 'to be retrieved url' so that the analytics
		// also include those from before 17/01
		
		// TODO: make sure BASE (path from / to this site) does NOT get included in the page
		
		$statement = $this->connection->prepare('SELECT DISTINCT `trackingID`, `time` FROM step WHERE `page` = ? AND `time` > ? GROUP BY `trackingID`');
		$url = '/mvr2' . $url;
		$statement->bind_param('ss', $url, $limit);
		$statement->execute();
		$statement->bind_result($id, $time);
		while ($statement->fetch()) {
			$array[$i] =  array(
				'id' => $id, 
				'time' => $time
				);
				$i++;
		}
		//   /temp
		
		return $array;
		
		
	}
	
	public function getVisits($limit) {
		//this function uses URL input so we need to prepare
		
		//debugging
		// $url = 'portfolio';
		
		//this statement get's all steps with different PHP sessions (trackingID's)
		$statement = $this->connection->prepare('SELECT DISTINCT `trackingID`, `time` FROM step WHERE `time` > ? GROUP BY `trackingID`');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('s', $limit);

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
	
	public function getHits($limit) {
		//this function uses URL input so we need to prepare
		
		//debugging
		// $url = 'portfolio';
		
		//this statement get's all steps with different PHP sessions (trackingID's)
		$statement = $this->connection->prepare('SELECT `trackingID`, `time` FROM step WHERE `time` > ?');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('s', $limit);

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
	
	public function getBrowsers($limit) {
		
		return $this->query('SELECT browser FROM tracking');
		
	}
	
	public function getPlatforms($limit) {
		
		return $this->query('SELECT platform FROM tracking');
		
	}
	
	public function getReferrers($limit) {
		
		return $this->query('SELECT referrer FROM tracking');
		
	}
	
	public function getPages($limit) {
		
		return $this->query('SELECT page FROM step');
		
	}
}
?>