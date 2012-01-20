<?php 

class TweetModel extends DBmodel {
	function __construct() { parent::__construct(); }
	
	function __destruct() { parent::__destruct(); }
	
	function getLatestTweet() {
		return $this->queryRow('SELECT * FROM `tweet` WHERE `date` = (SELECT MAX(`date`) FROM `tweet`)');
	}
	
	function getLatestDate() {
		return $this->querySingle('SELECT date FROM `tweet` WHERE `date` = (SELECT MAX(`date`) FROM `tweet`)','date');
	}
	
	function addTweet($tweet) {
		extract($tweet);
		
		# Maak een SQL statement klaar voor toevoegen
		$statement = $this->connection->prepare('INSERT INTO tweet (fid, date, raw, html) VALUES (?, ?, ?, ?)');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param(
				'siss', 
				$fid,
				$date, 
				$raw, 
				$html
				);
	
		# Voer het SQL statement uit
		$statement->execute();
	}

}

?>