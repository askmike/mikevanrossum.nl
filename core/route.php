<?php

/* 

This class takes a request (either array 
or string) and parses the request. It will then
create one controller to serve the request.

$con is a public property: If this class creates
a controller, it will get set to this property.

*/
class Route {
	
	public $con;
	
	function __construct($request) {
		
		//parse request
		if(is_string($request)) $request = explode('/',$request);

		//route
		switch ($request[0]) {
			case '':
				// home

				$this->con = new SiteController($request);

		        break;
		    case 'blog':
		        //single post request

				$this->con = new PostController($_GET['r']);

		        break;
			case 'analytics':
		        //single post request

				$this->con = new AnalyticsController;
				//20 is the number of days we want to go back
				$this->con->postStatistics($request, 20);

		        break;	
		    case 'track':
				// it's a track request: some analytics data getting passed
				// we don't return anything

				$this->con = new TrackController;

		        break;
		    case 'admin':
				// backend time

				$this->con = new AdminController($request, $_GET['r']);

		        break;
			case 'json':
				// it's a json request

				$this->con = new PostsController($request[2]);

				$this->con->jsonData();

		        break;

			case 'sitemap.xml':
				// it's a sitemap request

				$this->con = new ProtocolController;
				$this->con->sitemap();

		        break;
			case 'feed':
			case 'feed.rss':
				// it's a RSS request

				$this->con = new ProtocolController;
				$this->con->rss();

		        break;

			default:
				// 404
				
				new ErrorController;
		}
		
	}
}

?>