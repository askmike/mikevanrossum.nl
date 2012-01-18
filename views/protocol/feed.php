<?= '<?' 
// this prevents PHP from trying to parse the first line 
?>xml version="1.0" encoding="ISO-8859-1"?>
<rss version="2.0">
	<channel>
	        <title>Mike van Rossum</title>
	        <link>http://www.mikevanrossum.nl/</link>
	        <description>I blog about webdevelopment</description>
	        <item>
	            <?php foreach ($data as $row) { ?>
				<item>
					<title><?= $row['titel'] ?></title>
					<link><?= SITE . $row['url'] ?></link>
					<description><?= $row['excerpt'] ?></description>
					<author>Mike van Rossum</author>
					<pubDate><?= $row['edate'] ?></pubDate>
				</item>
				<?php } ?>
	        </item>
	</channel>
</rss>
<!--# <?= 'feed served in: ' . round( (microtime( true ) - STARTTIME), 5 ) . ' seconds' ?> -->