<?= '<?' 
// this prevents PHP from trying to parse the first line 
?>xml version="1.0" encoding="ISO-8859-1"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
	        <title>Mike van Rossum</title>
			<atom:link href="<?= SITE ?>feed.rss" rel="self" type="application/rss+xml"/>
	        <link>http://www.mikevanrossum.nl/</link>
	        <description>I blog about webdevelopment</description>
            <?php foreach ($data as $row) { ?>
			<item>
				<title><?= $row['titel'] ?></title>
				<link><?= SITE . $row['url'] ?></link>
				<description><?= $row['excerpt'] ?></description>
				<pubDate><?= $row['edate'] ?></pubDate>
				<guid isPermaLink="true"><?= SITE . $row['url'] ?></guid>
			</item>
			<?php } ?>
	</channel>
</rss>
<!--# <?= 'feed served in: ' . round( (microtime( true ) - STARTTIME), 5 ) . ' seconds' ?> -->