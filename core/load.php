<?php

class Load {
	function view($view, $data = null) {
		if(is_array($data)) {
			extract($data);
		}
		include 'views/' . $view . '.php';
	}
	
	function json($data) {
		echo json_encode($data);
	}
	
}

?>