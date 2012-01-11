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
		
		return $this->query('SELECT * FROM post ORDER BY id DESC LIMIT 0, 5');
		
	}
	
	public function getPost($url) {
		
		$statement = $this->connection->prepare('SELECT * FROM post WHERE url = ?');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('s', $url);

		# Voer het SQL statement uit
		$statement->execute();
		
		$statement->bind_result($id, $titel, $bodyHtml, $bodyMd, $meta, $tags, $date, $url, $modifyDate, $excerpt);
		
		$i = 0;
		
		while ($statement->fetch()) {
			$array[$i] =  array(
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
	
	public function updatePost($url, $input) {
		extract($input);
		
		$statement = $this->connection->prepare('UPDATE `mvr`.`post` SET titel = ?, `body-html` = ?, `body-md` = ?, meta = ?, tags = ?, `modify-date` = ?, excerpt = ? WHERE url = ?');
		
		# Koppel de variabele $tekst aan het SQL toevoegen statement
		$statement->bind_param('sssssdss', $title, $html, $md, $meta, $tags, $date, $excerpt, $url);
		
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
	
	// I write my posts in markdown [http://daringfireball.net/projects/markdown/]
	// when I hit save I want a couple of things to happen auto:
	// - I want to save the text excactly how I leave it
	// - I want everything stripped except for the plain text (excluding code from inside a pre) so I can create:
	//		- Excerpt (300 chars)
	//		- meta (160 chars)
	// - I want all my ' and " to be converted in HTML using SmartyPants [http://michelf.com/projects/php-smartypants/]
	// - I want all my pre's to be htmlentitie'd
	// - I want everything outside my pre's to be converted to HTML by PHPMarkdown [http://michelf.com/projects/php-markdown/]
	//
	// this function returns an array with all those different versions of the text
	function prepareContent($content) {
			//save it the same way as we got it
			$arr['md'] = $content;
		
			//						the excerpt & meta
			
			//remove all pre's (with content)
			$preless = preg_replace('/<pre.*?>(.*?)<\/pre>/imsu','', $content);
			
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
			
			require_once $_SERVER['DOCUMENT_ROOT'] . BASE . LIBS . 'smartypants.php';
			require_once $_SERVER['DOCUMENT_ROOT'] . BASE . LIBS . 'markdown.php';
			
			$sp = SmartyPants($content);
			
			// STATE MACHINE
			// this down here is probably overkill but this was my problem:
			
			// I want to write text in markdown
			// I want to write about code using SHJS, therefor I need to make pre's with classes (so I can't use the default tabbing)
			// when there is a tab infront of a line PHPMarkdown ignores my pre and adds it's own pre inside
			
			// borrowed from: http://stackoverflow.com/questions/1278491/howto-encode-texts-outside-the-pre-pre-tag-with-htmlentities-php#answer-1278575
			
			// this breaks when I nest pre's in pre's
			
			// $state = 0 if outside of a pre
			// $state = 1 if inside of a pre
			$segments = preg_split('/(<\/?pre.*?>)/', $sp, -1, PREG_SPLIT_DELIM_CAPTURE);
			$state = 0;
			foreach ($segments as &$segment) {
			    if ($state == 0) {
			        if (preg_match('<pre.*?>',$segment))
						$state = 1;	
			        else
						//this is outside the pre tag
						$segment = Markdown($segment);
			    } else if ($state == 1) {
			        if ($segment == '</pre>')
			            $state = 0;
					else
						//this is inside a pre tag
						$segment = htmlentities($segment);
			    }
			}

			$arr['html'] = implode($segments);
		
			
			// replaced by the statemachine
			//escape everything inside pre tags: http://davidwalsh.name/php-html-entities
			/*function pre_entities($matches) {
				return str_replace($matches[1],htmlentities($matches[1]),$matches[0]);
			}
			$arr['html'] = preg_replace_callback('/<pre.*?>(.*?)<\/pre>/imsu',pre_entities, $html);*/
			
			return $arr;
	}
}
?>