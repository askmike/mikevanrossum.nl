<h1>
	Overzicht blogposts
</h1>
<div class='message' id='addPostLink'><a href='<?= SITE . '/admin/create' ?>'>Voeg een post toe</a></div>
<div class='clearfix'></div>
<div id='blog-posts'>			
		<?php foreach ($data as $item) {
		//we only want arays in the array data
		if(is_array($item)) { 
			//strip off blog and add admin, this needs to get in the controller ?> 
			<a href="<?= BASE . 'admin/' . $item['url'] ?>" class='blog-post'>
				<h2>
					<?= $item['titel'] ?>
				</h2>
				<time datetime="<?= $item['dutchdate'] ?>">
					<?= $item['dutchdate'] ?>
				</time>
			</a>
		<?php } } ?>
</div>
<p>
	Oudere blogposts kan je wijzigen via de adminbar van de post zelf
</p>