<?php

class Controller {
	//create public vars for the loader, the model and the request
	public $load;
	public $model;
	public $request;
	
	function __construct() {
		$this->load = new Load;
	}
	
	function __destruct() {
		//kill the DB connection
		$this->model = NULL;
	}
	
	function error($e) {
		$e = new ErrorController($e);
	}
}

?>