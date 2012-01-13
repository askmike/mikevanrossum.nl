<?php

class DBModel {
	
	public $connection;
	
	# see: https://github.com/ju5tu5/v1112-Serverside-Scripting/blob/master/week3/inc/functions.inc.php#L2
	# removed comments since this runs auto
	function __construct(){
		$this->connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);

		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}
	}

	# see: https://github.com/ju5tu5/v1112-Serverside-Scripting/blob/master/week3/inc/functions.inc.php#L23
	# removed comments since this runs auto
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
	
	public function query($query) {
		//run the query on the connection
		$q = $this->connection->query($query);
		
		//return the results in a associative array
		return $this->assocResults($q);
	}
	
	public function queryRow($query) {
		$r = $this->query($query);
		
		return $r[0];
	}
	
	public function querySingle($query, $var) {
		$r = $this->queryRow($query);
		
		return $r[$var];
	}
}

?>