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
		
		//route based on the fhe first virtual dir
		switch ($request[0]) {
			case '':
				// home
				
				$this->con = new SiteController($request);

		        break;
		    case 'blog':
		        //single post request

				$this->con = new PostController($_GET['r']);

		        break;
		    case 'projects':
		        //single post request

				$this->con = new ProjectController($_GET['r']);

		        break;
			case 'analytics':
		        //single post request

				$this->con = new AnalyticsController;
				if($request[2]) $this->con->postStatistics($request);
				else $this->con->siteStatistics($request[1]);
				

		        break;	
		    case 'admin':
				// backend time

				$this->con = new AdminController();
				$this->con->route($request, $_GET['r']);

		        break;
			case 'json':
				// it's a json request

				$this->con = new PostsController($request[2]);

				$this->con->jsonData();

		        break;
			case 'sitemap':
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
			case 'sneaky':
				// restricted area

				$this->con = new ErrorController('sneaky');

		        break;
			case '403':
				// restricted area

				$this->con = new ErrorController(403);

		        break;
			case 'track':
				// it's a track request: some analytics data getting passed
				// we don't return anything

				$this->con = new TrackController;

		        break;
			default:
				// 404
				
				new ErrorController(404);
		}
		
	}
}

?>