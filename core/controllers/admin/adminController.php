<?php

class AdminController extends PartController {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		define('PAGE', 'admin');
		
	}
	
	function route($request, $r) {
		
		if($request[1] == 'posts') new AdminPostsController();
		
		else if($request[1] == 'create') new CreatePostController($r); 
		
		else if($request[1] == 'blog') new EditPostController($r); 
		
		else if($request[1] == 'portfolio') new EditPortfolioController($request);
		
		else if($request[1] == 'analytics') {
			$con = new AnalyticsController();
			$a = $con->siteStatistics($request, 30);
		} else $this->error(403);
	}
	
	function __destruct() { parent::__destruct(); }	
	
	function adminPage($view) {
		$this->load->view('header',$this->part);
		$this->load->view('admin/panel',$this->part);
		$this->load->view('admin/' . $view, $this->part);
		$this->load->view('footer',$this->part);
	}
}

?>