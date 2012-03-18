<section class='page'>
	<h1>
		Projects	
	</h1>
	<p>
		I've developed a couple of open source tools that aid me in web development, you can check out all my open source code at
		<a href='https://github.com/askmike' rel='nofollow'>Github</a>.
	</p>
	<div id='projects'>
		<?php foreach($data as $item) { if(is_array($item)) { ?> 
			<a href="<?= $item['url'] ?>">
				<h2>
					<?= $item['titel'] ?>
				</h2>
				<time datetime="<?= $item['humandate'] ?>">
					<?= $item['humandate'] ?>
				</time>
				<p>
					<?= $item['excerpt'] ?>
				</p>
			</a>
		<?php } } ?>
	</div>
</section>
