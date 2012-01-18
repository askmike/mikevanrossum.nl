<?= '<?' 
// this prevents PHP from trying to parse the first line 
?>xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc><?= SITE ?></loc>
		<changefreq>weekly</changefreq>
		<priority>1</priority>
	</url>
	<?php foreach ($data as $row) { ?>
	<url>
		<loc><?= SITE . $row['url'] ?></loc>
		<changefreq>monthly</changefreq>
		<priority>0.8</priority>
	</url>
	<?php } ?>
</urlset>
<!--# <?= 'sitemap served in: ' . round( (microtime( true ) - STARTTIME), 5 ) . ' seconds' ?> -->