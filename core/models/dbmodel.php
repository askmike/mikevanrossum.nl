<?php

class DBModel {
	
	public $connection;
	
	# Public: Open een actieve mysqli connectie op basis van constanten
	#			welke opgegeven staan in een configuratiebestand, in dit
	#			geval inc/config.inc.php
	#		  Geef een foutmelding als het niet goed gaat
	#
	# Examples:
	#
	#	$link = dbConnect();
	#	# => $link bevat een actieve mysqli connectie
	#
	# Returns: Een actieve mysqli connectie
	function __construct(){
		$this->connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);

		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}
	}

	# Public: Sluit een actieve mysqli connectie
	#
	# $mysqli - Een actieve mysqli connectie
	#
	# Examples:
	#
	#	dbClose($link);
	#	# => de connectie $link wordt afgesloten
	function __destruct(){
		$this->connection->close();
	}
	
	function assocResults($results) {
		//store events in an array
		while ($row = $results->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
}

?>