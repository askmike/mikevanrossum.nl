<?php

class EditPostController extends PartController {
	
	function __construct($request) {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		//because in the admin interface blog/ is prepended to the view url
		$request = substr($request, 6);
		
		$this->model = new PostModel;
		$this->load = new Load();
		
		//currently the online version can't be edited
		if($_POST['submit'] && LIVE == false) {
			$this->updatePost($request, $_POST);
		}
		
		$data = $this->model->getPost($request);
		
		//prepend domain + base to the url so the links are nicer
		$data['url'] = DOMAIN . BASE . $data['url'];
		
		// print_r($data);
		
		$this->part = $data;
		
		$this->load->view('header',$this->part);
		$this->load->view('admin/post',$this->part);
		$this->load->view('footer',$this->part);
	
	}
	
	function updatePost($url, $input) {
		//we need those from here
		require LIBS . 'smartypants.php';
		require LIBS . 'markdown.php';
		
		$arr['title'] = SmartyPants($input['title']);
		$arr['tags'] = $input['tags'];
		$arr['url'] = $url;
		$arr['date'] = time();
		
		$text = $this->prepareContent($input['content']);
		$arr['md'] = $text['md'];
		$arr['excerpt'] = $text['excerpt'];
		$arr['meta'] = $text['meta'];
		$arr['html'] = $text['html'];
		
		$this->model->updatePost($arr);
		
	}
	
	
	// I write my posts in markdown [http://daringfireball.net/projects/markdown/]
	// when I hit save I want a couple of things to happen auto:
	// - I want to save the text excactly how I leave it (with the exception of escaped anglebrackets in pre's (or I mess up the edit page))
	// - I want everything stripped except for the plain text (excluding code from inside a pre) so I can create:
	//		- Excerpt (300 chars) <- all the quotes need to be escaped
	//		- meta (160 chars) <- all the quotes need to be escaped
	// - I want all my ' and " to be converted in HTML using SmartyPants [http://michelf.com/projects/php-smartypants/]
	// - I want all my pre's to be htmlentitie'd
	// - I want everything outside my pre's to be converted to HTML by PHPMarkdown [http://michelf.com/projects/php-markdown/]
	//
	// this function returns an array with all those different versions of the text
	function prepareContent($content) {
			
			// I use this instead of htmlentities for the plain text, this prevents HTML to be parsed inside the edit screen
			// all HTML is served with htmlentities instead
			function removeAngleBrackets($str) {
				$str = str_replace('<','&lt;',$str);
				$str = str_replace('>','&gt;',$str);
				return $str;
			}
		
			$segments = preg_split('/(<\/?pre.*?>)/', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
			
			// STATE MACHINE
			// complicated solution for a complicated problem :)
			// problem: see above function
			
			// borrowed from: http://stackoverflow.com/questions/1278491/howto-encode-texts-outside-the-pre-pre-tag-with-htmlentities-php#answer-1278575
			
			// this breaks when I nest pre's in pre's (unless I escape the <pre> myself), could be fixed though
			
			// $state = 0 if outside of a pre
			// $state = 1 if inside of a pre
			$state = 0;
			
			$plaintext = '';
			$html = '';
			$preless = '';
			
			// $html, $plaintext and $preless are all written in here
			// it would be more readable/managable to seperate them into their own foreach IMO
			// however I'm doing a preg match on 1/2 of the segments (each pre element
			// introduces 3 new segments). Here I go for performace > readability*
			
			// *Though this only get's run whenever I update/create a post
			
			foreach ($segments as &$segment) {
			    if ($state == 0) {
			        if (preg_match('#<pre[^>]*>#i',$segment)) {
						//this is the pre opening tag
						$state = 1;	
						$html .= $segment;
						$plaintext .= $segment;
					} else {
						//this is outside the pre tag
						$plaintext .= $segment;
						$markdown = Markdown($segment);
						$html .= $markdown;
						$preless .= $markdown;
					}
			    } else if ($state == 1) {
			        if ($segment == '</pre>') {
						//this is the pre closing tag
						$state = 0;
						$html .= $segment;
						$plaintext .= $segment;
					} else {
						//this is inside the pre tag
						$plaintext .= removeAngleBrackets($segment);
						// first encode &gt; to > so I can re encode it together with other chars
						// else we get double encoding like: $amp;gt;
						$enti = html_entity_decode($segment);
						$html .= htmlspecialchars($enti, ENT_QUOTES);
					}
			    }
			}
			
			$arr['html'] = SmartyPants($html);
			$arr['md'] = $plaintext;
			
			//						the excerpt & meta
			
			// remove all html tags (markdown is already converted to HTML)
			$tagless = strip_tags($preless);
			
			// echo $tagless;
			
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
			
			// I need to smartypants the excerpt to [consistance is key]
			$excerpt = shrinkText($tagless, 275)  . ' (...)';
			$arr['excerpt'] = SmartyPants($excerpt);
			
			$arr['meta'] = shrinkText($tagless, 160);
			
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