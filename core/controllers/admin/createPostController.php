<?php

class CreatePostController extends PartController {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		if($_POST['submit'] && LIVE == false) {
			//create the post
			$this->createPost();
			
		} else {
			//let's spawn the form
			$data['script'] = 'slug';
			$this->load->view('header');
			$this->load->view('admin/createPost');
			$this->load->view('footer',$data);
		}
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	function createPost() {
		$arr['title'] = $_POST['titel'];
		
		//create timestamp
		if($_POST['time']) $arr['date'] = strtotime($_POST['time']);
		else $arr['date'] = time();
		
		//prepend blog/[year]/[month] to url
		$date = date('Y/m/',$arr['date']);
		$arr['url'] = 'blog/' . $date . $_POST['url'];
		
		$this->model = new PostModel;
		$this->model->createPost($arr);
		$this->model = null;
		
		header('Location: ' . BASE . 'admin/' . $arr['url']);
	}
}

?>