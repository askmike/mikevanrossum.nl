<?php

require CONTROLLERS . 'controller.php';

class TrackController extends Controller {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		if( !$this->checkTrack() ) return;
		
		require MODELS . 'trackModel.php';
		$this->model = new TrackModel;
		
		//check if this is a new session
		if($this->model->getSession($_POST['session'])) {
			//it's an existing session
		} else {
			//it's a new session
		}
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	function checkTrack() {
		//small checks to make sure nobody is messing with the POST input
		$whitelist = array('phptime','session','steps','client','referrer');
		
		//check if every whitelist item is in $_POST
		foreach ($whitelist as $item) {
		    if( !isset($_POST[$item]) ) return false;
		}
		
		//check if the're the same size
		if( sizeof($whitelist) != sizeof($_POST) ) return false;
		
		return true;
	}
}

?>