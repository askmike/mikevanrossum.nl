<?php

class AdminController extends PartController {
	
	function __construct($request, $r) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		define('PAGE', 'admin');
		
		$this->model = new PostModel;
		
		$this->load = new Load();
		
		//route
		if(empty($request[1])) $this->index();
		
		if($request[1] == 'blog') new editPostController($r); 
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	function index() {
		// get main data
		$data = $this->model->getPosts( 0, 20 );
		
		// overwrite main data with added dates
		
		// note: it would be better to just add the dates over here
		// instead of sending the whole array and getting it back with  
		// the dates added, however I would have to create a date array mapped
		// to the data array.
		
		// possible solution: create a general class that would handle mapping 2 arrays.
		$data = $this->getDatesFromItem($data);
		
		//if no date is provided we're at site/blog
		if(!$page) $data['firstpage'] = true;
		
		$this->part = $data;
		
		$this->load->view('header',$this->part);
		$this->load->view('admin/index',$this->part);
		$this->load->view('footer',$this->part);
	}	
}

?>