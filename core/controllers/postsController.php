<?php

class PostsController extends PartController {
	
	function __construct($page = null) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		require MODELS . 'postModel.php';
		
		$this->model = new PostModel;
		
		// get main data
		$data = $this->model->getPosts();
		
		// overwrite main data with added dates
		
		// note: it would be better to just add the dates over here
		// instead of sending the whole array and getting it back with  
		// the dates added, however I would have to create a date array mapped
		// to the data array.
		
		// possible solution: create a general class that would handle mapping 2 arrays.
		$data = $this->getDatesFromItems($data);
		
		//if no date is provided we're at site/blog
		if(!$page) $data['firstpage'] = true;
		
		$this->part = $data;
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
		
}

?>