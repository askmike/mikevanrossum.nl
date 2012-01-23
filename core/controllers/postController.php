<?php
		
class PostController extends PartController {
	
	function __construct($request, $analytics = null) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		define('PAGE', 'post');
		
		$this->model = new PostModel;
		
		// get main data
		$data = $this->model->getPost($request);
		
		
		//if the requested blog entry does not exist
		if(empty($data)) {
			$this->error(404);
			return;
		}
		
		if($analytics) $data['analytics'] = $analytics;
		
		$data['editUrl'] = DOMAIN . BASE . 'admin/' . $data['url'];
		
		// overwrite main data with added dates
		
		// note: it would be better to just add the dates over here
		// instead of sending the whole array and getting it back with  
		// the dates added, however I would have to create a date array mapped
		// to the data array.
		
		// possible solution: create a general class that would handle mapping 2 arrays
		$data = $this->getDatesFromItem($data);
		
		$this->load->view('header',$data);
		$this->load->view('post', $data);
		$this->load->view('footer');
		
		return $data;
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
}

?>