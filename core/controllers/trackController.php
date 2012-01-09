<?php

require CONTROLLERS . 'controller.php';

class TrackController extends Controller {
	
	private $session;
	
	function __construct($step) {
		//this runs the construct of the class this class is extending
		parent::__construct();
	
		require MODELS . 'trackModel.php';
		$this->model = new TrackModel;
		
		//get current session
		$this->session = $this->model->getSession($_POST['session']);
		
		if($step) {//it's a step req
			
			$whitelist = array('session','page');
			if( !$this->checkInput($whitelist) ) return;
			
			//it wants to add a step to a session
			$this->addStep();
			
		} else {//it's seems like a track req
			
			$whitelist = array('phptime','session','page','referrer', 'platform', 'resolution', 'viewport', 'browser');
			if( !$this->checkInput($whitelist) ) return;
			
			if(!empty($this->session)) {
				
				//it's a new pageload in an existing session
				$this->addStep();
			} else {
				
				//it's a new session
				$this->addTrack();
				
				//redo this because before the addTrack there was no record yet
				$this->session = $this->model->getSession($_POST['session']);
				
				$this->addStep();
			}
		}
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	function addStep() {
		
		$this->model->addStepToSession($_POST, $this->session['id']);
		
	}
	
	function addTrack() {
		
		$this->model->createNewSession($_POST);
		
	}
	
	//small checks to make sure nobody is messing with the POST input
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
}

?>