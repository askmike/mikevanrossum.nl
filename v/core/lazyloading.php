<?php

// lcfirst is new since 5.3
// my webhost does not support 5.3 yet
if(!function_exists('lcfirst')) {
	function lcfirst($str) {
		$str{0} = strtolower($str{0});
		return $str;
	}
}

//the line would be preferred however that's not working on my webhost
spl_autoload_register('lazyload');

function lazyload($class) {
	//we check for classes in those dirs
	$dirs = array(
		'', 
		APP, 
		CONTROLLERS,
		CONTROLLERS . 'admin/',
		MODELS,
		'libs/'
	);
	
	$len = sizeof($dirs);
	for($i = 0; $i < $len; ++$i) {
		// < PHP5.3
		// $class{0} = strtolower($class{0});
		// $file = SBASE . $dirs[$i]  . $class . '.php';
		// > PHP 5.3
		$file = SBASE . $dirs[$i]  . lcfirst($class) . '.php';
		if(file_exists($file)) {
			require_once $file;
			return;
		}
	}
}

?>