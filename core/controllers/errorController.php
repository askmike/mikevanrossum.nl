<?php

class ErrorController extends Controller {
	
	function __construct($e) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		if(!defined('PAGE')) {
		    define('PAGE', 'post');
		}
		
		if($e == 404) $this->notFound();
		if($e == 403) $this->restricted();
		if($e == 'sneaky') $this->sneaky();
		
	}
	
	function notFound() {
	
		header("HTTP/1.0 404 Not Found"); 
		
		$this->load->view('header');
		$this->load->view('error/404');
		$this->load->view('footer');
	}
	
	function restricted() {
		
		header("HTTP/1.0 403 Restricted"); 
		
		$this->load->view('header');
		$this->load->view('error/403');
		$this->load->view('footer');
	}
	
	function sneaky() {
		
		header("HTTP/1.0 403 Restricted"); 
		
		$this->load->view('header');
		$this->load->view('error/sneaky');
		$this->load->view('footer');
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
		
}

?>