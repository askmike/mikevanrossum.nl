<?php

define('CRON',true);

$url = 'http://mijnrealiteit.nl/feed';
$c = curl_init($url);
curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($c, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($c, CURLOPT_CONNECTTIMEOUT, 10);
$html = curl_exec($c);
curl_close($c);

//TODO: just grab the first instead of all images ~~
//from: http://stackoverflow.com/questions/1196570/using-regular-expressions-to-extract-the-first-image-source-from-html-codes#answer-1196765
preg_match_all('/<img [^>]*src=["|\']([^"|\']+)/i', $html, $matches);
$image = $matches[1][0];

$mr = new MijnrealiteitModel;

$arr['url'] = $image;
$arr['fetchdate'] = time();

$latest = $mr->getLatestImage();

//check if the url is different then the latest we got stored
if($arr['url'] != $latest) {
	//if so add it to the DB
	$mr->addImage($arr);
}

?>