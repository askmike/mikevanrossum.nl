<?php

class HomeController extends PartController {
	
	public $mr;
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		$this->model = new TweetModel;
		
		// get main data
		$data = $this->model->getLatestTweet();
		$this->mr = new MijnrealiteitModel();
		$data['mijnrealiteitPhoto'] = $this->mr->getLatestImage();
		// overwrite main data with added dates
		
		// note: it would be better to just add the dates over here
		// instead of sending the whole array and getting it back with  
		// the dates added, however I would have to create a date array mapped
		// to the data array.
		
		// possible solution: create a general class that would handle mapping 2 arrays.
		$data = $this->getDatesFromItem($data);
		
		//print_r($part);
		$this->part = $data;
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
}

?>