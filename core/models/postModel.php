<?php

class PostModel extends DBmodel {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	public function getNumberOfPosts() {
		return $this->querySingle('SELECT count( * ) as numberOfPosts FROM post', 'numberOfPosts');
	}
	
	public function getPosts($from, $number) {
		
		return $this->query('SELECT excerpt,titel,date,url FROM post ORDER BY date DESC LIMIT ' . $from . ', ' . $number);
		
	}
	
	public function getPost($url) {
		
		$statement = $this->connection->prepare('SELECT * FROM post WHERE url = ?');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('s', $url);

		# Voer het SQL statement uit
		$statement->execute();
		
		$statement->bind_result($id, $titel, $bodyHtml, $bodyMd, $meta, $tags, $date, $url, $modifyDate, $excerpt);
		
		while ($statement->fetch()) {
			$array =  array(
				'id' => $id, 
				'titel' => $titel, 
				'bodyHtml' => $bodyHtml, 
				'bodyMd' => $bodyMd,
				'meta' => $meta,
				'tags' => $tags, 
				'date' => $date, 
				'url' => $url, 
				'excerpt' => $excerpt
				);
				
			$i++;
		}
		
		return $array;
	}
	
	public function updatePost($input) {
		extract($input);
		
		$statement = $this->connection->prepare('UPDATE `mvr`.`post` SET titel = ?, `body-html` = ?, `body-md` = ?, meta = ?, tags = ?, `modify-date` = ?, excerpt = ? WHERE url = ?');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('sssssdss', $title, $html, $md, $meta, $tags, $date, $excerpt, $url);
		
		//debugging
		//echo 'UPDATE `mvr`.`post` SET titel = "'.$title.'", `body-html` = "'.$html.'", `body-md` = "'.$md.'", meta = "'.$meta.'", tags = "'.$tags.'", `modify-date` = '.$date.', excerpt = "'.$excerpt.'" WHERE url = "'.$url.'"';
		
		# Voer het SQL statement uit
		$statement->execute();
		
		// print_r($input);
		
	}
}
?>