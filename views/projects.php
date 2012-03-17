<section class='page'>
	<h1>
		Projects	
	</h1>
	<p>
		Check in de tussentijd mijn 
		<a href='https://github.com/askmike' rel='nofollow'>Github</a>.
	</p>
	<div id='projects'>
		<?php foreach($data as $item) { if(is_array($item)) { ?> 
			<a href="<?= $item['url'] ?>">
				<h2>
					<?= $item['titel'] ?>
				</h2>
				<time datetime="<?= $item['dutchdate'] ?>">
					<?= $item['dutchdate'] ?>
				</time>
				<p>
					<?= $item['body-html'] ?>
				</p>
			</a>
		<?php } } ?>
	</div>
</section>