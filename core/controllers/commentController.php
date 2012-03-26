<?php
		
class CommentController extends PartController {
	
	function __construct() {
		//this runs the construct of the class this class is extending
		parent::__construct();
		
		$this->model = new CommentModel;
	}
	
	function __destruct() {
		//this runs the destruct of the class this class is extending
		parent::__destruct();
	}
	
	function getComments($postid) {
		return $this->model->getCommentsForPost($postid);
	}
	
	function addComment() {
		
		require APP . 'config/comment.php';
		
		//we already checked for this at frontend, if this triggers someone is playing games anyway.
		if(empty($_POST['author']) || empty($_POST['comment']) || empty($_POST['email'])) return;
		
		$body = $this->prepareComment();
		$website = $this->prepareWebsite();
		
		$comment = array(
			'name' => $_POST['author'],
			'comment' => $body,
			'email' => $_POST['email'],
			'website' => $website,
			'post' => $_POST['post'],
			'ip' => $_SERVER['REMOTE_ADDR'],
			'useragent' => $_SERVER['HTTP_USER_AGENT'],
			'session' => $_POST['session'],
			'date' => time(),
			'approved' => 0
		);
		
		//get the postid
		$t = new PostModel;
		$postid = $t->getPost($_POST['post']);
		$t = null;
		
		$comment['postid'] = $postid['id'];
		
		$userid = $this->model->getUser($comment['email']);
		
		if(!$userid) { 	//it's a new user
			$this->model->addUser($comment);
			$userid = $this->model->getUser($comment['email']);
		}
		
		$comment['userid'] = $userid;
		
		//	check if it's spam
		// http://code.google.com/p/akismet-php4/wiki/ClassDocumentation
		require LIBS . 'akismet.class.php';
		
		$akismetComment = array(
			'author' => $comment['name'],
			'email' => $comment['email'],
			'website' => $comment['website'],
			'body' => $comment['post'],
			'permalink' => 'http://mikevanrossum.nl/' . $comment['post'],
			'user_ip' => $comment['ip'],
			'user_agent' => $comment['useragent']
		);
		
		$akismet = new Akismet('http://www.mikevanrossum.nl/', AKISMET_API, $akismetComment);
		
		// Test for errors.
		if($akismet->errorsExist()) { // Returns true if any errors exist.
			
			$errorMessage = 'something went wrong, could you please let me know this happened (my email address is at the bottom of the page)? Please provide me with this error: ';
			
	        if($akismet->isError('AKISMET_INVALID_KEY')) {
                echo $errorMessage . 'AKISMET_INVALID_KEY';
	        } elseif($akismet->isError('AKISMET_RESPONSE_FAILED')) {
                echo $errorMessage . 'AKISMET_RESPONSE_FAILED';
	        } elseif($akismet->isError('AKISMET_SERVER_NOT_FOUND')) {
                echo $errorMessage . 'AKISMET_SERVER_NOT_FOUND';
	        }
			
		} else {
	        // No errors, check for spam.
	        if ($akismet->isSpam()) { 
				echo "I think you're spamming. If you're not please let me know (my email address is at the bottom of the page).";
	        } else {
				$comment['approved'] = 1;
				$this->mailComment($comment);
				echo "Your comment has been added.";
	        }
		}
		
		$this->model->addComment($comment);
	}
	
	// 		ripped from the editpost contoller
	//
	// we write comments in markdown [http://daringfireball.net/projects/markdown/]
	// on comment I want a couple of things to happen auto:
	// - I want all my ' and " to be converted in HTML using SmartyPants [http://michelf.com/projects/php-smartypants/]
	// - I want all my pre's to be htmlentitie'd
	// - I want all my html outside pre's removed
	// - I want everything outside my pre's to be converted to HTML by PHPMarkdown [http://michelf.com/projects/php-markdown/]
	//
	function prepareComment() {
	
		require LIBS . 'smartypants.php';
		require LIBS . 'markdown.php';
		
		$content = $_POST['comment'];
		
		$segments = preg_split('/(<\/?pre.*?>)/', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
		
		// STATE MACHINE
		// problem: see above function
		
		// borrowed from: http://stackoverflow.com/questions/1278491/howto-encode-texts-outside-the-pre-pre-tag-with-htmlentities-php#answer-1278575
		
		// $state = 0 if outside of a pre
		// $state = 1 if inside of a pre
		$state = 0;
		
		$html = '';
		
		foreach ($segments as &$segment) {
		    if ($state == 0) {
		        if (preg_match('#<pre[^>]*>#i',$segment)) {
					//this is the pre opening tag
					$state = 1;	
					$html .= $segment;
				} else {
					//this is outside the pre tag
					$html .= Markdown(SmartyPants(strip_tags($segment)));
				}
		    } else if ($state == 1) {
		        if ($segment == '</pre>') {
					//this is the pre closing tag
					$state = 0;
					$html .= $segment;
				} else {
					//this is inside the pre tag
					$html .= htmlspecialchars($segment, ENT_QUOTES);
				}
		    }
		}
		
		return $html;
	}
	
	function prepareWebsite() {
		$url = $_POST['url'];
		
		// append 'http://' if omitted 	
		// http://stackoverflow.com/a/2762083/843033
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
	        $url = "http://" . $url;
	    }
		
		return $url;
	}
	
	function mailComment($comment) {
		
		require LIBS . 'phpmailer.php';
		
		# Maak een nieuw object aan van het type PHPMailer
		$mail = new PHPMailer();

		# Maak duidelijk dat we via SMTP willen mailen
		$mail->IsSMTP();
		# Geef debug informatie (1 = errors, 2 = errors and messages)
		$mail->SMTPDebug = 0;

		$mail->Host = MAIL_HOST;
		$mail->Username = MAIL_USER;  
		$mail->Password = MAIL_PASSWORD;
		$mail->SMTPAuth = true;
		$mail->Port = 587;

		# Stel een afzender en reply-to adres in
		$mail->SetFrom(MAIL_FROM_ADDRESS, MAIL_NAME);
		$mail->AddReplyTo(MAIL_FROM_ADDRESS, MAIL_NAME);

		# Stel het onderwerp in
		$mail->Subject    = "new comment on mikevanrossum.nl";

		# Stel een alternatieve tekst in (voor text only mail clients)
		$mail->AltBody    = "Om dit bericht te kunnen lezen moet uw mail programma HTML mail aan kunnen.";

		# Haal de inhoud van het bericht op uit een extern html bestand en koppel het
		$body = '<pre>' . var_export($comment, true) . '</pre>';
		$mail->MsgHTML($body);

		# Voeg een ontvanger toe (deze regel kan meerdere keren ingevuld worden)
		$mail->AddAddress(MAIL_USER, MAIL_NAME);

		$mail->Send();
	}
}

?>