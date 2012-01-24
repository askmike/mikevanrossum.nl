<?php

class AnalyticsController extends PartController {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();

		define('ANALYTICS','true');
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	/* this function prepares all site traffic we're gonna display, 
	going max 31 days back */
	function siteStatistics($days) {
		define('PAGE','admin');
		
		//default is 1 month (31 days), also capped at 1 month for now
		if(!is_numeric($days) || $days > 31 || $days < 1) $days = 31;
		
		$analytics['days'] = $days;
		
		$daysAgo = strtotime('-' . $analytics['days'] . ' day midnight');
		
		// echo $daysAgo;
		
		$this->model = new AnalyticsModel;
		
				//the top 5 posts
		$analytics['top'] = $this->model->getTopPosts(5,$daysAgo);
		
				//the 2 line graphs
				
		$analytics['visits'] = $this->allVisits($days, $daysAgo);
		$analytics['hits'] = $this->allHits($days, $daysAgo);
		
		
				//the pie charts
		
			//browsers
		//all the data
		$browsers = $this->model->getBrowsers($daysAgo);
		$data = array('chrome','safari','ff','ie','dif');
		$regex = array('Chrome','Safari','Firefox','MSIE');
		//the html
		$browsers = $this->parseForPieChart($browsers, 'browser', $data, $regex);
		$analytics['browser'] = $this->createPieTable($browsers, 'browserData');
		
			//platforms
		//all the data
		$platform = $this->model->getPlatforms($daysAgo);
		$data = array('mac','windows','iphone','android','dif');
		$regex = array('MacIntel','Win','iPhone','Linux');
		//the html
		$platform = $this->parseForPieChart($platform,'platform', $data, $regex);
		$analytics['platform'] = $this->createPieTable($platform, 'platformData');
		
			//referrers
		//all the data
		$referrers = $this->model->getReferrers($daysAgo);
		$data = array('youtube','facebook','google','twitter','dif');
		$regex = array('youtube.com','facebook.com','google','t.co');
		//the html
		$referrers = $this->parseForPieChart($referrers, 'referrer', $data, $regex);
		$analytics['referrer'] = $this->createPieTable($referrers, 'referrerData');
		
			//page
		//all the data
		$pages = $this->model->getPages($daysAgo);
		$data = array('home','portfolio','posts','blog','dif');
		$regex = array('^home','^(portfolio|#portfolio)','blog\/','^blog');
		//the html
		$pages = $this->parseForPieChart($pages, 'page', $data, $regex);
		$analytics['pages'] = $this->createPieTable($pages, 'pagesData');
		
		
		
		
				//we got everything, let's spawn
		$this->load->view('header');
		$this->load->view('admin/analytics',$analytics);
		$this->load->view('footer');
	}
	
	/* this function prepares everything we need to display
	statistics about a post, going max 20 days back */
	function postStatistics($request) {
		$days = 20;
		
		//remove analytics from the url
		array_shift($request);
		
		//turn array into a string again
		$request = implode('/',$request);
		
		$this->model = new AnalyticsModel;
		
		$html = $this->postVisits($request, $days);
		
		new PostController($request, $html);
	}
	
	function postVisits($request, $days) {
		$daysAgo = strtotime('-' . $days . ' day');
		$postHits = $this->model->getPostVisits(BASE . $request, $daysAgo);
		
		return $this->visitsToLinechart($postHits, $days, 'dataTable');
	}
	
	function allVisits($days, $daysAgo) {
		$postHits = $this->model->getVisits($daysAgo);
		
		return $this->visitsToLinechart($postHits, $days, 'dataVisits');
	}
	
	function allHits($days, $daysAgo) {
		$postHits = $this->model->getHits($daysAgo);
		
		// print_r($postHits);
		
		return $this->visitsToLinechart($postHits, $days, 'dataHits');
	}
	
	function visitsToLinechart($hits, $dots, $id) {
		
		//check if we got any data
		if(!empty($hits)) {
			$hits = $this->processDates($hits);
			$table = $this->createLineTable($hits, $dots, $id);
			
		} else {
			$table = 'Er lijkt geen data beschikbaar te zijn :(';
		}
		
		return $table;
	}
	
	
	/* this function takes raw database entries with timestamps 
	it returns a new array sorted with the days counted like so
	returned['d']['1']['12'][20]
		
	the '1' is the month number
	the '12' is the day number
	the '20' is the times day 12 was in the input
	
	besides that it also adds a bunch of stuff like the monthnames
	in Dutch and the current day of the month (so we can calculate
	the days backwords with correct previous months) */
	function processDates($dates) {
		//prepare vars
		$results['thisMonth'] = date('n');
		$lastMonthTS = strtotime("-1 month");
		$results['lastMonth'] = date('n', $lastMonthTS);
		$results['today'] = date('j');
		$results['daysInLastMonth'] = date('t', $lastMonthTS);
		$results['strThisMonth'] = strval($results['thisMonth']);
		$results['strLastMonth'] = strval($results['lastMonth']);
		
		//this is a method of the partcontroller class.
		
		$results['thisMonthNamed'] = $this->getMonth($results['thisMonth'] - 1);
		$results['lastMonthNamed'] = $this->getMonth($results['thisMonth'] - 2);
		
		foreach($dates as $date) {
			$month = date('n',$date['time']);
			$day = date('j',$date['time']);
			$strMonth = strval($month);
			$strDay = strval($day);
				
			//check if this day is already recorded
			if(isset($results['d'][$strMonth][$strDay])) {
				//this day is already recorded
				$results['d'][$strMonth][$strDay]++;
			} else {
				//the first record for this day, let's create it
				$results['d'][$strMonth][$strDay] = 1;
			}
		}
		
		return $results;
	}

	function createLineTable($analytics, $days, $id) { 
		$table = '<table class="rTable" id="' . $id . '" data-thisMonth="';
		$table .= $analytics['thisMonthNamed'] . '" data-lastMonth="' . $analytics['lastMonthNamed'];
		$table .= '" data-monthSwitch="' . $analytics['today'] . '"><tfoot><tr>';
		
		$str = ''; 
		for($i = 0; $i <= $days; $i++) {  
			$day = $analytics['today'] + ($i - $days);
			if($day <= 0) $day = $analytics['daysInLastMonth'] + $day;
			$str .=  '<th>' . $day . '</th>'; 
		} 
		
		$table .= $str . '</tr></tfoot><tbody><tr>';
			
		$str = ''; 
		for($i = 0; $i <= $days; $i++) {  
			$day = $analytics['today'] + ($i - $days);
			// $day = $analytics['daysInLastMonth'] + $day;
			if($day > 0) {
				$a = $analytics['d'][$analytics['strThisMonth']][$day];	
			} else {
				$day = $analytics['daysInLastMonth'] + $day;
				$a = $analytics['d'][$analytics['strLastMonth']][$day];	
			}
			$str .= '<td>' . ($a ? $a : '0') . '</td>';
			
		} 
			
		$table .= $str .'</tr></tbody></table>';

		return $table;
	}
	
	/* the functions below create everything we need to spawn pie charts */
	
	/*
	
	This function takes a set of database results and returns a new array with keys as 
	items and values as the number of times it was in the database set.
		
		$arr is the input (DB records)
		$row is the name of the row (DB records)
		
		//vars for parsing
		$data has to be an array with 5 items!
		$regex has to be an array with 4 items!
		
		TODO: this needs to get dynamic
	*/
	function parseForPieChart($arr, $row, $data, $regex) {
		
		$results = $this->arrayify($data);
		
		foreach($arr as $pl) {
			if(preg_match('/' . $regex[0] . '/', $pl[$row])) $results[$data[0]]++;
			else if(preg_match('/' . $regex[1] . '/', $pl[$row])) $results[$data[1]]++;
			else if(preg_match('/' . $regex[2] . '/', $pl[$row])) $results[$data[2]]++;
			else if(preg_match('/' . $regex[3] . '/', $pl[$row])) $results[$data[3]]++;
			else $results[$data[4]]++;
		}
		
		return $results;
	}
	
	function createPieTable($arr, $id) {
		extract($arr);
		
		$html = '<div id="' . $id .'"';
		foreach ($arr as $item => $number) {
			$html .= ' data-'.$item.'="'.$number.'"';
		}
		$html .= ' ></div>';
		
		return $html;
	}
	
	//turn ('a','b') into ('a' => 0, 'b' => 0)
	function arrayify($arr) {
		foreach($arr as $item) {
			$results[$item] = 0;
		}
		return $results;
	}
	
}

?>