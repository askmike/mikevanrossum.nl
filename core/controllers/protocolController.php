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
		
		// this prevents the sitemap from showing up in google
		header("X-Robots-Tag: noindex", true);
		
		$this->load->view('protocol/sitemap',$data);
	}
	
	function rss() {
		$this->model = new PostModel;
		
		$data = $this->model->getPosts(0,10);
		
		// I provide dates, those need to be in english
		$data = $this->addEnglishDates($data);
		$data = $this->encodeItems($data);
		
		header('Content-Type: application/rss+xml; charset=ISO-8859-1');
		
		$this->load->view('protocol/feed',$data);
	}
	
	function addEnglishDates($array) {
		$len = sizeof($array);
		for($i = 0; $i < $len ; $i++){
			if(is_array($array[$i])) {
				$array[$i]['edate'] = date('D, j M Y h:i:s',$array[$i]['date']) . ' +0100';
			}
		}
		return $array;
	}
	
	function encodeItems($array) {
		$len = sizeof($array);
		for($i = 0; $i < $len ; $i++){
			if(is_array($array[$i])) {
				$array[$i]['excerpt'] = $this->encodeString($array[$i]['excerpt']);
				$array[$i]['titel'] = $this->encodeString($array[$i]['titel']);
				$array[$i]['edate'] = $this->encodeString($array[$i]['edate']);
			}
		}
		return $array;
	}
	
	function encodeString($str) {
		return mb_convert_encoding($str, "ISO-8859-1", "UTF-8");
	}
	
	
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
		
}

?>