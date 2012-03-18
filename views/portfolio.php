	<section class='page'>
		<h1>Portfolio</h1>
		<div>
			<div id='pleft'>
				<?php foreach ($data as $item) {
				//we only want arays in the array data
				if(is_array($item)) { 
					//the html needs to get minified by php
					//see: http://stackoverflow.com/questions/5312349/minifying-final-html-output-using-regular-expressions-with-codeigniter 
					?> <div class='hide'><a href='#portfolio/<?= $item['name'] ?>'></a><p><?= $item['name'] ?></p></div>
				<?php } } ?>
			</div>
			<div id='pright'>
				<div class="portfolio-item"></div>
			</div>
		</div>
	</section>
	<div id='portfolio-items'>
	<?php foreach ($data as $item) {
	//we only want arays in the array data
	if(is_array($item)) { ?> 
		<div class="portfolio-item">
			<h3>
				<?= $item['name'] ?>
			</h3>
			<img src="<?= IMG . 'portfolio/' . $item['image'] ?>" alt="<?= 'Afbeelding van ' . $item['name'] ?>">
			<?= $item['body-html'] ?>
			<p class="portfolio-technieken">
				Technieken: <?= $item['tech'] ?><br />
				Datum: <?= $item['humandate'] ?>
			</p>
		</div>
	<?php } } ?>
	</div>
