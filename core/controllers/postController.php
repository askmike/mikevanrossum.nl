<?php

class PostController extends PartController {
	
	function __construct($page = null) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		require MODELS . 'postModel.php';
		
		$this->model = new postModel;
		
		//get main data
		$data = $this->model->getPosts();
		//overwrite main data with added dates
	
		$data = $this->getDatesFromItems($data);
		
		if(!$page) $data['firstpage'] = true;
		
		$this->part = $data;
	}
	
	function __destruct() {
		//this runs the construct of the class this class is extending
		parent::__destruct();
	}
	
	function addDatesToPosts($array) {
		if(is_array($array)) {
			foreach ($array as $value) {
				$value = $this->addDutchDate($value, 'date', 'dutchdate');
				$newArr[] = $value;
			}
		} 
		// if something goes wrong with addDutchDate (beasue of the 
		// supplied parameters) OR if it's not an array
		return $newArr ? $newArr : $array;
	}
	
}

?>