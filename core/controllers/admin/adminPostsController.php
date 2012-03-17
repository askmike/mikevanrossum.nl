<?php

class AdminPostsController extends AdminController {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
			
		$this->model = new PostModel;
		
		// get main data
		$data = $this->model->getPosts( 0, 100 );
		
		$data = $this->getDatesFromItems($data);
		
		$data = $this->getNumberOfComments($data);
		
		//if no date is provided we're at site/blog
		if(!$page) $data['firstpage'] = true;
		
		$this->part = $data;
		
		$this->adminPage('posts');
	}
	
	function __destruct() { parent::__destruct(); }
	
	function getNumberOfComments($data) {
		
		$t = new CommentModel;
		$comments = $t->getNofComments();
		$t = null;
		
		
		//every post
		$len = sizeof($data);
		for($i = 0; $i < $len ; $i++){
			
			// every comment
			$lenj = sizeof($comments);
			for($j = 0; $j < $lenj ; $j++){
				
				//if the ids match assign the nOfComments
				if($comments[$j]['postid'] == $data[$i]['id']) {
					$data[$i]['nOfComments'] = $comments[$j]['times'];
				} 
				
			}
			
			if(empty($data[$i]['nOfComments'])) {
				$data[$i]['nOfComments'] = 0;
			}
			
		}
		
		// echo '<pre>';
		// print_r($comments);
		// echo '</pre>';
		
		return $data;
		
	}
}

?>