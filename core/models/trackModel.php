<?php

class TrackModel extends DBmodel {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	// session input is a string
	public function getSession($session) {
		
		$track = $this->connection->query('SELECT * FROM tracking WHERE phpsession = "' . $session . '"');
		
		return $track->fetch_assoc();
	
		// return $this->query('SELECT * FROM tracking WHERE phpsession = "' . $session . '"');
		
	}
	
	// this function creates a new record in tracking
	// track input is an array
	public function createNewSession($track) {
		
		# Maak een SQL statement klaar voor toevoegen
		$statement = $this->connection->prepare('INSERT INTO tracking (phpsession, phptime, referrer, platform, browser, resolution, viewport) VALUES (?, ?, ?, ?, ?, ?, ?)');
		
		//prepare vars
		extract($track);
		$page .= ',';
		$pagetime = time() . ',';
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param(
				'sdsssss', 
				$session,
				$phptime, 
				$referrer, 
				$platform, 
				$browser,
				$resolution,
				$viewport
				);
	
		# Voer het SQL statement uit
		$statement->execute();	
		
		//debugging
		// $sql = 'INSERT INTO tracking (phpsession, steps, steptimes, phptime, referrer, platform, browser, resolution, viewport) VALUES (';
		// $sql .= '"' . $session . '","' . $steps . '","' . $steptimes . '",' . $phptime . ',"' . $referrer . '","' . $platform . '","' . $browser . '","' . $resolution . '","' .  $viewport . '")';
		// echo $sql;
		
	}
	
	//this function creates a new step record
	//the trackID is the ID of the PHP session belonging to this step
	public function addStepToSession($step, $trackID) {
		
		$statement = $this->connection->prepare('INSERT INTO step (trackingID, time, page) VALUES (?, ?, ?)');
		
		$page = $step['page'];
		$pagetime = time();
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('sss', $trackID, $pagetime, $page);

		# Voer het SQL statement uit
		$statement->execute();
		
		//debugging
		//echo ' INSERT INTO step (trackingID, time, page) VALUES ("' . $trackID . '", "' . $pagetime . '", "' . $page . '")';
		
	}
	
	function arrayToString($array) {
		$string = '';
		
		foreach ($array as $v) { $string .= $v . ',';}
		
		return $string;
	}
}
?>