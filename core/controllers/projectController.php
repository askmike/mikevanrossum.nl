<?php
		
class ProjectController extends PartController {
	
	function __construct($request) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		//
		
		define('PAGE', 'single');
		
		$this->model = new ProjectModel;
		
		// get main data
		$data = $this->model->getProject($request);
		
		//if the requested blog entry does not exist
		if(empty($data)) {
			$this->error(404);
			return;
		}
		
		//kill the DB connection
		$comments = null;
		
		$data['comments'] = $this->getDatesFromItems($data['comments']);
		
		if($analytics) $data['analytics'] = $analytics;
		
		// $data['editUrl'] = DOMAIN . BASE . 'admin/' . $data['url'];
		
		$data = $this->getDatesFromItem($data);
		
		$this->load->view('header',$data);
		$this->load->view('project', $data);
		$this->load->view('footer');
		
		return $data;
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
}

?>