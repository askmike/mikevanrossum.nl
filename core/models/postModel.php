<?php

class PostModel extends DBmodel {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
	}
	
	public function getPosts() {
		
		$posts = $this->connection->query('SELECT * FROM post ORDER BY id DESC');

		return $this->assocResults($posts);;
	}
	
	
}
?>