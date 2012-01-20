<?php

				//		first we grab the latest 10 tweets

function get_tweets() {
	//even though we specify 10, we only get 7
    $url = 'http://twitter.com/statuses/user_timeline/mikevanrossum.json?count=10';
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt ($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($c, CURLOPT_CONNECTTIMEOUT, 10);
    $tweets = curl_exec($c);
    curl_close($c);

    $tweets = json_decode($tweets);

    foreach($tweets as $tweet) {
	
	//prepare each tweet
	
		$text = $tweet->text;
		$html = twitterify($text);
		$date = strtotime($tweet->created_at);
	
		$arr[] = array(
			'fid' => $tweet->id_str,
			'date' => $date,
			'raw' => $text,
			'html' => $html
			);
		$i++;
	}

    return $arr;
}

//from: http://snipplr.com/view/28482/twitterify/
function twitterify($ret) {
	$ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
	$ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
	$ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $ret);
	$ret = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
	return $ret;
}

$tweets = get_tweets();



					//		then we compare and store them

$tm = new TweetModel;
$latest = $tm->getLatestDate();

foreach($tweets as $tweet) {
	//only store new tweets || or if the DB is empty
	if($latest < $tweet['date'] || empty($latest)) {
		$tm->addTweet($tweet);
	}
}


					//		done, kill the connection
$tm = null;

?>