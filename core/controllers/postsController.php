<?php

class PostsController extends PartController {
	
	function __construct($page = 1) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		require MODELS . 'postModel.php';
		
		$this->model = new PostModel;
		
		$numberOfPosts = $this->model->getNumberOfPosts();
		
		// get main data
		$data = $this->model->getPosts( $page * 5 - 5 );
		
		// overwrite main data with added dates
		
		// note: it would be better to just add the dates over here
		// instead of sending the whole array and getting it back with  
		// the dates added, however I would have to create a date array mapped
		// to the data array.
		
		// possible solution: create a general class that would handle mapping 2 arrays.
		$data = $this->getDatesFromItems($data);
		
		//show the previous (older posts) if there are
		if($page*5 < $numberOfPosts) $data['previousPage'] = BASE . "json/blog/" . ($page + 1);
		
		//show the next (newer posts) if we're not at page 1
		if($page > 1) $data['nextPage'] = BASE . "json/blog/" . ($page - 1);
		
		$this->part = $data;
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
		
}

?>