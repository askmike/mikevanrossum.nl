<?php

class ProtocolController extends Controller {
	
	function __construct() {
		
		//this runs the construct of the class this class is extending
		parent::__construct();
		
	}
	
	function sitemap() {
		$this->model = new PostModel;
		
		// just for abstraction's sake, sitemap URLS are limited to 50 000
		// see: http://www.sitemaps.org/protocol.html
		
		$data = $this->model->getUrls(50000);
		
		$this->load->view('sitemap',$data);
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
		
}

?>