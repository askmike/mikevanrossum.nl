<?php 

class MijnrealiteitModel extends DBmodel {
	function __construct() { parent::__construct(); }
	
	function __destruct() { parent::__destruct(); }
	
	function getLatestImage() {
		return $this->querySingle('SELECT url FROM `mijnrealiteit` WHERE `fetchdate` = (SELECT MAX(`fetchdate`) FROM `mijnrealiteit`)','url');
	}
	
	function addImage($image) {
		extract($image);
		
		# Maak een SQL statement klaar voor toevoegen
		$statement = $this->connection->prepare('INSERT INTO `mijnrealiteit` (url, fetchdate) VALUES (?, ?)');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param(
				'si', 
				$url,
				$fetchdate
				);
	
		# Voer het SQL statement uit
		$statement->execute();
	}

}

?>