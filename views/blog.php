	<section class='page'>
		<h1>
			Blog	
		</h1>
		<div id='blog-posts'>			
				<?php foreach ($data as $item) {
				//we only want arays in the array data
				if(is_array($item)) { ?> 
					<a href="<?= $item['url'] ?>" class='blog-post'>
						<h2>
							<?= $item['titel'] ?>
						</h2>
						<time datetime="<?= $item['dutchdate'] ?>">
							<?= $item['dutchdate'] ?>
						</time>
						<p>
							<?= $item['excerpt'] ?>
						</p>
					</a>
					
				<?php } } ?>
		</div>
		<div id="blog-nav">
			<?php //lastpage does not exist yet, so right now it always passes this if
			if(!$lastpage) { ?>
			<a href='#'>&#60; oudere posts</a>
			<?php } ?>
			<?php if(!$firstpage) { ?>
			<a href='#'>nieuwere posts &#62;</a>
			<?php } ?>
		</div>
	</section>