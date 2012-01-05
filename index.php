<?php

//so I can time how long the it takes before we sent it back to the client
//when we get to views/footer.php we compare this with then.
define('STARTTIME', microtime(true));

//define basic things we need before we can require anything at all
define('APP', 'core/');
define('CONTROLLERS', APP . 'controllers/');
define('MODELS', APP . 'models/');

//get everything we need
require APP . 'config.php';

//parse request
$request = explode('/',$_GET['r']);

//route
if ($request[0] == 'json') { 
	//it's a json request
	//return json and die asap

} else if ($request[0] == 'leden') { 
	//empty
	
} else { 
	//home or 404
	
	require CONTROLLERS . 'siteController.php';
	$con = new SiteController($request);
	
} 

//end with killing the connection
$con = NULL;

?>