<?php

class Route {
	
	function __construct($request) {
		
		//parse request
		if(is_string($request)) $request = explode('/',$request);

		//route
		switch ($request[0]) {
		    case 'blog':
		        //single post request

				$con = new PostController($_GET['r']);

		        break;
			case 'analytics':
		        //single post request

				$con = new AnalyticsController;
				//20 is the number of days we want to go back
				$con->postStatistics($request, 20);

		        break;	
		    case 'track':
				// it's a track request: some analytics data getting passed
				// we don't return anything

				$con = new TrackController;

		        break;
		    case 'admin':
				// backend time

				$con = new AdminController($request, $_GET['r']);

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

			case 'sitemap.xml':
				// it's a sitemap request

				$con = new SitemapController;

		        break;


			default:
				// 404
				
				new ErrorController;
		}
		
	}
}

?>