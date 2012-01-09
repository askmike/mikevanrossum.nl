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
if ($request[0] == 'blog' /*|| $request[0] == 'blog'*/) { 
	//single post request
	
	define('PAGE', 'post');
	
	require CONTROLLERS . 'postController.php';
	$con = new PostController($_GET['r']);

} else if ($request[0] == 'track') { 
	//it's a track request: some analytics data getting passed
	
	require CONTROLLERS . 'trackController.php';
	$con = new TrackController($request[1]);
	
} else { 
	//home or 404
	
	define('PAGE', 'site');
	
	require CONTROLLERS . 'siteController.php';
	$con = new SiteController($request);
	
} 

//end with killing the connection
if($con) $con = NULL;

?>