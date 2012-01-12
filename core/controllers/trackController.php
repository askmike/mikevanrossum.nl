<?php

require CONTROLLERS . 'controller.php';

class TrackController extends Controller {
	
	private $session;
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
	
		$this->model = new TrackModel;
		
		//get current session
		$this->session = $this->model->getSession($_POST['session']);
		
		//first we check the POST for a track request
		// 		if it's a track request but we have the ID already (pageload), add a step
		//		else add a track
		//if it fails we check we for step request
		//		and add a step
		//if that fails somebody tries to break something
		
		$whitelist = array('phptime','session','page','referrer', 'platform', 'resolution', 'viewport', 'browser');
		if( $this->checkInput($whitelist) ) {
			//it's a track request
			
			if(!empty($this->session)) {
				//it's a new pageload in an existing session
				$this->addStep();
			} else {
				//it's a new session
				//let's add a track and first step
				$this->addTrack();
				
				//redo this because before the addTrack there was no record yet
				$this->session = $this->model->getSession($_POST['session']);
				$this->addStep();
			}
		} else {
			echo 'its def a step';
			$whitelist = array('session','page');
			if( !$this->checkInput($whitelist) ) return;

			//we're safe, let's do this!
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
		
		$this->model->createNewSession($_POST);
		
	}
	
	// small checks to make sure nobody is messing with the POST vars
	//
	// http://stackoverflow.com/questions/2284317/do-i-have-to-use-mysql-real-escape-string-if-i-bind-parameters#answer-2284327
	function checkInput($whitelist) {
		//this could be improved by storing all the PHP created sessions in the DB
		//and compare POST session with the DB
		
		//check if every whitelist item is in $_POST
		foreach ($whitelist as $item) {
		    if( !isset($_POST[$item]) ) return false;
		}
		
		//check if the're the same size
		if( sizeof($whitelist) != sizeof($_POST) ) return false;
		
		//all checks are passed
		return true;
	}
	
	
	//		verify the input agressive (regex) since it's POSTED
	//		this is not the fastest but no one is waiting :)

	function checkTrack() {
		// I verify everything with the exception of the browser string (not going to do anything with it yet + 
		// can't find which chars are allowed / not allowed)
		
		//phptime: needs to be a number (with dots) / we match for a decimal with (min 2 & max 4) digits behind the .
		if(!preg_match('/^\d+(.\d{2,4})?$/', $_POST['phptime'])) return false;
		//resolution + viewport: needs to be [number]x[number]
		if(!preg_match('/[0-9]+(x[0-9]+)/', $_POST['resolution'])) return false;
		if(!preg_match('/[0-9]+(x[0-9]+)/', $_POST['viewport'])) return false;
		
		if(!$this->checkStep()) return false;
		
		return true;
	}
	
	function checkStep() {
		//in page I don't want any strange chars
		if(!preg_match('/^[^(){};^*@$%<>\\\'"]*$/', $_POST['page'])) return false;
		//session: needs to be hex and 32 chars
		if(!preg_match('/[a-f0-9]{32}/', $_POST['session'])) return false;
		return true;
	}
}

?>