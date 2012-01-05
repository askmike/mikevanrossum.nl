<?php

class PostModel extends DBmodel {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	public function getPosts() {
		
		$posts = $this->connection->query('SELECT * FROM post ORDER BY id DESC');

		return $this->assocResults($posts);;
	}
	
	
}
?>