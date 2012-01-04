<?php

class Controller {
	//create public vars for the loader, the model and the request
	public $load;
	public $model;
	public $request;
	
	function __construct() {
		//nothing yet
	}
	
	function __destruct() {
		//kill the DB connection
		$this->model = NULL;
	}
}

?>