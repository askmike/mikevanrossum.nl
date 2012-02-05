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
require APP . 'lazyloading.php';

//route parses the request and serves accordingly
$route = new Route($_GET['r']);

//end with killing the controllers
if($route->con) $route->con = NULL;

?>