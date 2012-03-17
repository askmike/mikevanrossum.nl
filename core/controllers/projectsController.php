<?php

class ProjectsController extends PartController {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		$data = array();
		
		$this->model = new ProjectsModel();
		
		$data = $this->model->getProjects();
		
		$data = $this->getDatesFromItems($data);
		
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		
		$this->part = $data;
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
}

?>