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
	
	function siteStatistics() {
		$this->load->view('header');
		$this->load->view('admin/analytics');
		$this->load->view('footer');
	}
	
	/* this function prepares everything we need to display
	statistics about a post and the last 20 days */
	function postStatistics($request) {
		
		//remove analytics from the url
		array_shift($request);
		
		//turn array into a string again
		$request = implode('/',$request);
		
		
		$twentyDaysAgo = strtotime("-20 day");
		
		$this->model = new AnalyticsModel;
		$postHits = $this->model->getPostAnalytics(BASE . $request, $twentyDaysAgo);
		
		print_r($postHits);
		
		//check if we got any data
		if(!empty($postHits)) {
			$hits = $this->processDates($postHits);
			$table = $this->createTable($hits);
		} else {
			$table = 'Er lijkt geen data beschikbaar te zijn :(';
		}
		
		new PostController($request, $table);
		
	}
	
	/* this function takes raw database entries with timestamps 
	it returns a new array sorted with the days counted like so
	returned['d] ->
		['1']['12'][20]
		
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
				$results['d'][$strMonth][$strDay] = 0;
			}
		}
		return $results;
	}

	function createTable($analytics) { 
		$table = '<table id="dataTable" data-thisMonth="';
		$table .= $analytics['thisMonthNamed'] . '" data-lastMonth="' . $analytics['lastMonthNamed'];
		$table .= '" data-monthSwitch="' . $analytics['today'] . '"><tfoot><tr>';
		
		$str = ''; 
		for($i = 0; $i < 21; $i++) {  
			$day = $analytics['today'] + ($i - 20);
			if($day <= 0) $day = $analytics['daysInLastMonth'] + $day;
			$str .=  '<th>' . $day . '</th>'; 
		} 
		
		$table .= $str . '</tr></tfoot><tbody><tr>';
			
		$str = ''; 
		for($i = 0; $i < 21; $i++) {  
			$day = $analytics['today'] + ($i - 20);
			// $day = $analytics['daysInLastMonth'] + $day;
			if($day > 0) {
				$a = $analytics['d'][$analytics['strThisMonth']][$day];	
			} else {
				$day = $analytics['daysInLastMonth'] + $day;
				$a = $analytics['d'][$analytics['strLastMonth']][$day];	
			}
			$str .= '<td>' . ($a ? $a : '0') . '</td>';
			
		} 
			
		$table .= $str .'</tr></tbody></table><div id="hitsHistory"></div>';

		return $table;
	}
	
}

?>