<?php

class ErrorController extends Controller {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		if(!defined('PAGE')) {
		    define('PAGE', 'post');
		}
		
		header("HTTP/1.0 404 Not Found"); 
		
		$this->load = new Load();
		
		$this->load->view('header');
		$this->load->view('404');
		$this->load->view('footer');
		
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
		
}

?>