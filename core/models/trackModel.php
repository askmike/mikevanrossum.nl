<?php

require MODELS . 'dbmodel.php';

class TrackModel extends DBmodel {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	public function getSession($session) {
		
		$track = $this->connection->query('SELECT session FROM tracking WHERE session = ' . $session);
		
		return (!empty($this->$track));
	}
	
	
}
?>