<?php

require MODELS . 'dbmodel.php';
require CONTROLLERS . 'controller.php';
require CONTROLLERS . 'partController.php';

class AdminController extends PartController {
	
	function __construct($request) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		require MODELS . 'postModel.php';
		
		$this->model = new PostModel;
		
		include APP . 'load.php';
		$this->load = new Load();
		
		if($request == 'admin/' || $request == 'admin') $this->index();
		else $this->editPost($request);
	
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	function index() {
		// get main data
		$data = $this->model->getPosts( 0 );
		
		// overwrite main data with added dates
		
		// note: it would be better to just add the dates over here
		// instead of sending the whole array and getting it back with  
		// the dates added, however I would have to create a date array mapped
		// to the data array.
		
		// possible solution: create a general class that would handle mapping 2 arrays.
		$data = $this->getDatesFromItem($data);
		
		//if no date is provided we're at site/blog
		if(!$page) $data['firstpage'] = true;
		
		$this->part = $data;
		
		$this->load->view('header',$this->part);
		$this->load->view('admin/index',$this->part);
		$this->load->view('footer',$this->part);
	}
	
	function editPost($request) {
		//because in the admin interface blog/ is prepended to the view url
		$request = substr($request, 6);
		
		//currently the online version cant be edited
		if($_POST['submit'] && LIVE == false) {
			$this->model->updatePost($request, $_POST);
		}
		
		$data = $this->model->getPost($request);
		$data = $data[0];
		
		//prepend domain + base to the url so the links are nicer
		$data['url'] = DOMAIN . BASE . $data['url'];
		
		// print_r($data);
		
		$this->part = $data;
		
		$this->load->view('header',$this->part);
		$this->load->view('admin/post',$this->part);
		$this->load->view('footer',$this->part);
	}
		
}

?>