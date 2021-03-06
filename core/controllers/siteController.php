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
		
		define('PAGE', 'site');
		
		$this->getSite();
		
	}
	
	function getSite() {  
		//if multiple functions need the menu
		
		$this->load->view('header');
		
		$home = new HomeController;
		$this->load->view('home',$home->part);
		
		$projects = new ProjectsController;
		$this->load->view('projects',$projects->part);
		
		$portfolio = new PortfolioController;
		$this->load->view('portfolio',$portfolio->part);
		
		$posts = new PostsController;
		$this->load->view('blog',$posts->part);
		
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