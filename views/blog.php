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
						<time datetime="<?= $item['humandate'] ?>">
							<?= $item['humandate'] ?>
						</time>
						<p>
							<?= $item['excerpt'] ?>
						</p>
					</a>
					
				<?php } } ?>
			<div id="blog-nav">
				<?php if($previousPage) { ?>
				<a href='<?= $jsonPrevious ?>'>&#60; olders posts</a>
				<?php } ?>
				<?php if($nextPage) { ?>
				<a href='<?= $jsonNext ?>' class='right'>newer posts &#62;</a>
				<?php } ?>
			</div>
		</div>
	</section>
