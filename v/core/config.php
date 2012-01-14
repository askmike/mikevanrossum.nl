<?php

//BASE is the root of our app
//substr strips off 'index.php'
define('BASE', substr($_SERVER['PHP_SELF'],0,-9));
define('SBASE',$_SERVER['DOCUMENT_ROOT'] . BASE);
define('LIBS', SBASE . 'libs/');

//used paths
define('IMG', BASE . 'static/img/');

if (BASE == '/mikevanrossum/' || 
	BASE == '/mikevanrossum/publish/' ||
	BASE == '/mikevanrossumcopy/' ||
	BASE == '/mikevanrossumcopy/publish/') define('LIVE', false);
else define('LIVE', true);

if(LIVE == false) { // Local connection settings
	define('MYSQL_HOST', 'localhost');
	define('MYSQL_USER', 'root');
	define('MYSQL_PASS', '');
	define('MYSQL_PORT', '3306');
	define('MYSQL_DB', 'mvr');
} else { //online connection settings
	define('MYSQL_HOST', 'localhost');
	define('MYSQL_USER', 'vgemtdpx_mike');
	define('MYSQL_PASS', 'puck001');
	define('MYSQL_PORT', '3306');
	define('MYSQL_DB', 'vgemtdpx_mikevanrossum');
} 

//maybe I should go for a protocol relative URL
define('DOMAIN', $_SERVER['HTTPS'] ? 'https://' : 'http://' . $_SERVER['SERVER_NAME']);

ini_set('session.use_trans_sid', 0);
ini_set('session.use_only_cookies', 1);

session_start();

?>