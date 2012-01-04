	<section class='page'>
		<h1>
			Blog	
		</h1>
		<div id='blog-posts'>
			
				<?php foreach ($data as $item) {
				//we only want arays in the array data
				if(is_array($item)) { ?> 
					
					<a href="<?= BASE . $item['url'] ?>" class='blog-post'>
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
				
		<div id="blog-nav">
			<a href='#'>&#60; oudere posts</a>
			<a href='#'>nieuwere posts &#62;</a>
		</div>
	</section>