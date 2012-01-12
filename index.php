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
switch ($request[0]) {
    case 'blog':
        //single post request
		define('PAGE', 'post');

		require CONTROLLERS . 'postController.php';
		$con = new PostController($_GET['r']);
		
        break;
    case 'track':
		// it's a track request: some analytics data getting passed
		// we don't return anything

		require CONTROLLERS . 'trackController.php';
		$con = new TrackController;

        break;
    case 'admin':
		// backend time

		define('PAGE', 'admin');

		require CONTROLLERS . 'adminController.php';
		$con = new AdminController($_GET['r']);

        break;
	case 'json':
		// it's a json request
		
		require MODELS . 'dbmodel.php';
		require CONTROLLERS . 'controller.php';
		require CONTROLLERS . 'partController.php';
		require CONTROLLERS . 'postsController.php';
		$con = new PostsController($request[2]);
		
		$con->jsonData();
		
        break;
	case '':
		// home

		define('PAGE', 'site');

		require CONTROLLERS . 'siteController.php';
		$con = new SiteController($request);

        break;

	default:
		// home or 404
}



//end with killing the connection
if($con) $con = NULL;

?>