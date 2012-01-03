	<section class='page'>
		<h1>Portfolio</h1>
		<div>
			<div id='pleft'>
				<?php foreach ($data as $portfolioItem) {
				//we only want arays in the array data
				if(is_array($portfolioItem)) { 
					//the html needs to get minified by php
					//see: http://stackoverflow.com/questions/5312349/minifying-final-html-output-using-regular-expressions-with-codeigniter ?> 
					<div class='hide'><a href='#portfolio/<?= $portfolioItem['name'] ?>'></a><p><?= $portfolioItem['name'] ?></p></div>
				<?php } } ?>
			</div>
			<div id='pright'>
				<div class="portfolio-item"></div>
			</div>
		</div>
	</section>
	<div id='portfolio-items'>
	<?php foreach ($data as $portfolioItem) {
	//we only want arays in the array data
	if(is_array($portfolioItem)) { ?> 
		<div class="portfolio-item">
			<h3>
				<?= $portfolioItem['name'] ?>
			</h3>
			<?= $portfolioItem['body-html'] ?>
			<p class="portfolio-technieken">
				Technieken: <?= $portfolioItem['tech'] ?><br />
				Datum: <?= $portfolioItem['dutchdate'] ?>
			</p>
		</div>
	<?php } } ?>
	</div>