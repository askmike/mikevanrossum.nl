<?php 

//this script imports an wordpress export file into my database (the post table).

$xml = simplexml_load_file("mikevanrossumnl.xml");

$arr = array();
$i = 0;

$link = dbConnect();

foreach($xml->children() as $channel) {
	foreach($channel as $item) {
		
		$arr[$i]['titel'] = (string)$item->title;
		$time = strtotime($item->wp_post_date);
		$arr[$i]['date'] = $time;
		$arr[$i]['url'] = 'blog/' . date('Y/m/',$time) . (string)$item->wp_post_name . '/';		
		
		$content = (string)$item->content_encoded;
		$arr[$i]['bodyMD'] = $content;
		
		$len = strlen($content);		
		if($len > 295) {
			$pos = strpos($content, " ", 295);
			if($pos < $len) $excerpt = substr($content, 0, $pos);
			else $excerpt = $content;
		}
		
		$arr[$i]['excerpt'] = $excerpt;
		
		$len = strlen($excerpt);		
		if($len > 160) {
			$pos = strpos($excerpt, " ", 160);
			if($pos < $len) $meta = substr($content, 0, $pos);
			else $meta = $excerpt;
		}
		
		$arr[$i]['meta'] = $meta;
		
		$titel = $link->real_escape_string($arr[$i]['titel']);
		$content = $link->real_escape_string($content);
		$meta = $link->real_escape_string($meta);
		$url = $link->real_escape_string($arr[$i]['url']);
		$excerpt = $link->real_escape_string($excerpt);
		
		$query = 'INSERT INTO post (titel, `body-html`, `body-md`, meta, date, url, excerpt) VALUES ("' . $titel .'","' . $content . '","' . $content . '","' . $meta . '",' . $time . ',"' . $url . '","' . $excerpt . '")';
		
		//echo $query . '<hr>';
		
		// $link->query($query);
		
		$i++;
	}
}

dbClose($link);

function dbConnect(){
	$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);

	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	return $mysqli;
}

# Public: Sluit een actieve mysqli connectie
#
# $mysqli - Een actieve mysqli connectie
#
# Examples:
#
#	dbClose($link);
#	# => de connectie $link wordt afgesloten
function dbClose($mysqli){
	$mysqli->close();
}

//print_r($arr);

?>