<?php 

class ProjectsModel extends DBmodel {
	
	function __construct() { parent::__construct(); }
	
	function __destruct() { parent::__destruct(); }

	function getProjects() {
		return $this->query('SELECT * FROM project');
	}
}

?>