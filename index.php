<?php

//so I can time how long the it takes before we sent it back to the client
//when we get to views/footer.php we compare this with then.
define('START', microtime(true));

//define basic things we need before we can require anything at all
define('APP', 'core/');
define('CONTROLLERS', APP . 'controllers/');
define('MODELS', APP . 'models/');

//get everything we need
require APP . 'config.php';

//parse request
$request = explode('/',$_GET['r']);

//route
if (true) { 
	require CONTROLLERS . 'SiteController.php';
	$con = new SiteController($request);

} else if ($request[0] == 'leden' || $request[0] == 'lid') { 
	// leden or member
	
//	require CONTROLLERS . 'memberController.php';
//	$con = new MemberController($request);
	
} else { 
	//home or 404
	
//	require CONTROLLERS . 'homeController.php';
//	$con = new HomeController($request);
	
} 

//end with killing the connection
$con = NULL;

?>