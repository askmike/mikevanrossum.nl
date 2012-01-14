<?php

//so I can time how long the it takes before we sent it back to the client
//when we get to views/footer.php we compare this with then.
define('STARTTIME', microtime(true));

//define basic things we need before we can require_once anything at all
define('APP', 'core/');
define('CONTROLLERS', APP . 'controllers/');
define('MODELS', APP . 'models/');

//get everything we need
require APP . 'config.php';
require APP . 'lazyloading.php';

//parse request
$request = explode('/',$_GET['r']);

//route
switch ($request[0]) {
    case 'blog':
        //single post request

		$con = new PostController($_GET['r']);
		
        break;
    case 'track':
		// it's a track request: some analytics data getting passed
		// we don't return anything

		$con = new TrackController;

        break;
    case 'admin':
		// backend time

		$con = new AdminController($_GET['r']);

        break;
	case 'json':
		// it's a json request
		
		$con = new PostsController($request[2]);
		
		$con->jsonData();
		
        break;
	case '':
		// home

		$con = new SiteController($request);

        break;

	default:
		// 404
		new ErrorController;
}



//end with killing the connection
if($con) $con = NULL;

?>