<?php

//really need lazy loading
require CONTROLLERS . 'controller.php';
require CONTROLLERS . 'partController.php';
require MODELS . 'dbmodel.php';
		
class PostController extends PartController {
	
	function __construct($request) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		require MODELS . 'postModel.php';
		
		$this->model = new PostModel;
		
		// get main data
		$data = $this->model->getPost($request);
		
		// overwrite main data with added dates
		
		// note: it would be better to just add the dates over here
		// instead of sending the whole array and getting it back with  
		// the dates added, however I would have to create a date array mapped
		// to the data array.
		
		// possible solution: create a general class that would handle mapping 2 arrays.
		//$data = $this->getDatesFromItems($data);
		
		include APP . 'load.php';
		$this->load = new Load();
		
		$this->load->view('header');
		$this->load->view('post', $data);
		$this->load->view('footer');
		
		//print_r($part);
		return $data;
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
}

?>