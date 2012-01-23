<?php

class EditPortfolioController extends PartController {
	
	function __construct($request) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		$this->load->view('header');
		$this->load->view('admin/portfolio');
		$this->load->view('footer');
	
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
}

?>