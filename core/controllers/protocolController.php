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
	
	function rss() {
		$this->model = new PostModel;
		
		$data = $this->model->getPosts(0,10);
		
		// I provide dates, those need to be in english
		$data = $this->addEnglishDates($data);
		
		$this->load->view('feed',$data);
	}
	
	function addEnglishDates($array) {
		if(is_array($array)) {
			//we can't use a for each loop because we need to manip the array we're looping
			$len = sizeof($array);
			for($i = 0; $i < $len ; $i++){
				if(is_array($array[$i])) {
					$array[$i]['edate'] = date('D, j F Y',$array[$i]['date']);
				}
			}
		}
		return $array;
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
		
}

?>