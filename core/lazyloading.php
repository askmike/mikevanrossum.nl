<?php

spl_autoload_register(function($class) {
	
	//we check for classes in those dirs
	$dirs = array(
		'', 
		APP, 
		APP . 'controllers/', 
		APP . 'models/',
		'libs/'
	);
	
	$len = sizeof($dirs);
	for($i = 0; $i < $len; ++$i) {
		$file = SBASE . $dirs[$i]  . lcfirst($class) . '.php';
		if(file_exists($file)) {
			require_once $file;
			return;
		}
	}
});


?>