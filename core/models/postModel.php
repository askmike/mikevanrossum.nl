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
	
	public function getPosts() {
		
		$posts = $this->connection->query('SELECT * FROM post ORDER BY id DESC LIMIT 0, 5');

		return $this->assocResults($posts);
	}
	
	public function getPost($url) {
		
		$statement = $this->connection->prepare('SELECT * FROM post WHERE url = ?');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('s', $url);

		# Voer het SQL statement uit
		$statement->execute();
		
		$statement->bind_result($id, $titel, $bodyHtml, $bodyMd, $meta, $tags, $date, $url, $modifyDate, $excerpt);
		while ($statement->fetch()) {
			//why a while loop?
			return array(
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
		}
	}
	
	public function updatePost($url, $input) {
		extract($input);
		
		$statement = $this->connection->prepare('UPDATE `mvr`.`post` SET titel = ?, `body-html` = ?, `body-md` = ?, meta = ?, tags = ?, `modify-date` = ?, excerpt = ? WHERE url = ?');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('sssssdss', $title, $html, $md, $meta, $tags, $date, $excerpt, $url);
		
		require_once $_SERVER['DOCUMENT_ROOT'] . BASE . LIBS . 'smartypants.php';
		require_once $_SERVER['DOCUMENT_ROOT'] . BASE . LIBS . 'markdown.php';
		
		//		prepare all vars
		// url, title, content and tags are here
		$text = $this->prepareContent($content);
		$md = $text['md'];
		$excerpt = $text['excerpt'];
		$meta = $text['meta'];
		$html = $text['html'];
		$date = time();
		
		//debugging
		//echo 'UPDATE `mvr`.`post` SET titel = "'.$title.'", `body-html` = "'.$html.'", `body-md` = "'.$md.'", meta = "'.$meta.'", tags = "'.$tags.'", `modify-date` = '.$date.', excerpt = "'.$excerpt.'" WHERE url = "'.$url.'"';
		
		# Voer het SQL statement uit
		$statement->execute();
		
	}
	
	function prepareContent($content) {
			//save it the same way as we got it
			$arr['md'] = $content;
		
			//						the excerpt & meta
			
			//remove all pre's (with content)
			function nothing($matches) {
				return '';
			}
			$preless = preg_replace_callback('/<pre.*?>(.*?)<\/pre>/imsu',nothing, $content);
			
			//remove all tags
			$preless = strip_tags($preless);
			
			function shrinkText($str, $limit) {
				$strlen = strlen($str);
				if($strlen > $limit) {
					$pos = strpos($str, ' ', $limit);
					if($strlen > $pos) {
						$result = substr($str,0,$pos);
					}
				}
				return $result ? $result : $str;
			}
			
			$arr['excerpt'] = shrinkText($preless, 290)  . ' (...)';
			$arr['meta'] = shrinkText($preless, 160);
			
			//						the html
			
			//smarty pants the text: http://daringfireball.net/projects/smartypants/
			$sp = SmartyPants($content);

			//markdown the text: http://daringfireball.net/projects/markdown/
			$html = Markdown($sp);

			//escape everything inside pre tags: http://davidwalsh.name/php-html-entities
			function pre_entities($matches) {
				return str_replace($matches[1],htmlentities($matches[1]),$matches[0]);
			}
			$arr['html'] = preg_replace_callback('/<pre.*?>(.*?)<\/pre>/imsu',pre_entities, $html);
			
			return $arr;
	}
}
?>