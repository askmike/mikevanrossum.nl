<?php

class Load {
	function view($view, $data = null) {
		if(is_array($data)) {
			extract($data);
		}
		
		include 'views/' . $view . '.php';
	}
	
}

?>