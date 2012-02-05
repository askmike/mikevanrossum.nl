<?php

require CONTROLLERS . 'controller.php';

class TrackController extends Controller {
	
	private $session;
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct(); 
		
		//I don't want to track on the local version
		// if(LIVE == false) return; 

		$this->model = new TrackModel;
		
		//get current session
		$this->session = $this->model->getSession($_POST['session']);
		
		
		if($_POST['type'] == 'track') {
			// it's a track
			
			$whitelist = array('type','phptime','session','page','referrer', 'platform', 'resolution', 'viewport', 'browser');
			if(!$this->checkInput($whitelist)) return;
			
			if(!empty($this->session)) {
				// it's a new pageload in an existing session
				$this->addStep();
			} else {
				// it's a new session
				$this->addTrack();
				
				//redo this because before the addTrack there was no record yet
				$this->session = $this->model->getSession($_POST['session']);
				$this->addStep();
			}
			
		} else {
			// it's a step
			$whitelist = array('track','session','page');
			
			$this->addStep();
			
		}
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	
	function addStep() {
		
		if(!$this->checkStep()) return;
		
		$this->model->addStepToSession($_POST, $this->session['id']); 
	}
	
	function addTrack() {
		
		if(!$this->checkTrack()) return;
		
		$arr = $_POST;
		$arr['phptime'] *= 1000;
		
		$this->model->createNewSession($arr);
		
	}
	
	// small checks to make sure nobody is messing with the POST vars
	// the functions below this one check each input key 
	function checkInput($whitelist) {
		
		//check if every whitelist item is in $_POST
		foreach ($whitelist as $item) {
		    if( !isset($_POST[$item]) ) return;
		}
		
		//check if the're the same size
		if( sizeof($whitelist) != sizeof($_POST) ) return;
		
		//all checks are passed
		return true;
	}
	
	
	//		verify the input agressive (regex) since it's POSTED

	function checkTrack() {
		// I verify everything with the exception of the browser string (not going to do anything with it yet + 
		// can't find which chars are allowed / not allowed)
		
		//phptime: needs to be a number (with dots) / we match for a decimal with (min 2 & max 4) digits behind the .
		if(!preg_match('/^\d+(.\d{2,4})?$/', $_POST['phptime'])) return;
		//resolution + viewport: needs to be [number]x[number]
		if(!preg_match('/[0-9]+(x[0-9]+)/', $_POST['resolution'])) return;
		if(!preg_match('/[0-9]+(x[0-9]+)/', $_POST['viewport'])) return;
		
		if(!$this->checkStep()) return;
		
		return true;
	}
	
	function checkStep() {
		//in page I don't want any strange chars
		if(!preg_match('/^[^(){};^*@$%<>\\\'"]*$/', $_POST['page'])) return;
		//session: needs to be hex and 32 chars 
		if(!preg_match('/[a-f0-9]{32}/', $_POST['session'])) return; 
		return true;
	}
}

?>