<?php

require CONTROLLERS . 'controller.php';

// the site controller is responsible for retrieving all parts of the site
// it uses partControllers to do that

class SiteController extends Controller {
	//create public vars for the loader, the model and the request
	public $load;
	public $model;
	public $request;
	
	function __construct() {
		
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		
		//controllers responsible for getting all the parts
		require CONTROLLERS . 'partController.php';
		//we're gonna need our base model a couple of times
		require MODELS . 'dbmodel.php';
		
		
		//require the load
		include APP . 'load.php';
		//instanciate load
		$this->load = new Load();
		
		$this->getSite();
		
	}
	
	function getSite() {  
		//if multiple functions need the menu
		
		$this->load->view('header');
		$this->load->view('home');
		
		//load the controller part
		require CONTROLLERS . 'portfolioController.php';
		$portfolio = new PortfolioController;
		$this->load->view('portfolio',$portfolio->part);
		
		require CONTROLLERS . 'postController.php';
		$post = new PostController;
		$this->load->view('blog',$post->part);
		
		$this->load->view('footer');
	}
	
	
	function __destruct() {
		//this runs the construct of the class this class is extending
		parent::__destruct();
	}
	
	//following 2 functions transform timestamp to dutch dates 
	function addDutchDate($array, $timestamp, $name) {
		if(is_array($array)) {
			$month = date('n ',$array[$timestamp]);
			$array[$name] = date('j ',$array[$timestamp]) . $this->getMonth($month -1) . date(' Y',$array[$timestamp]);
		}
		return $array;
	}
	
	function getMonth($number) {
		$allMonths = array('Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December');
		return $allMonths[$number];
	}
}

?>