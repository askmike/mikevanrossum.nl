<p>
	De onderstaande analytics komen uit mijn eigen database. Ik heb zelf de 
	<a href='https://github.com/askmike/mikevanrossum.nl/blob/master/static/js/script.js#L383'>tracker</a> geschreven die ze erin stopt.
	Ook heb ik de PHP 
	<a href='https://github.com/askmike/mikevanrossum.nl/blob/master/core/controllers/admin/analyticsController.php'>geschreven</a>
	die alles hier netjes presenteert.
</p>
<p>
	De grafische weergave (grafieken &amp; diagrammen) zijn <a href='http://raphaeljs.com/'>Raphaël</a> plugins.
</p>
<hr>
<p>
	<form id='days'>
	Statistieken van
	<input id='nOfDays' value='<?= $days ?>'>
	dagen.
	<input type='submit' name='submit' value='Go!' id='goNofDays'>
</p>
<hr>
<h1>Website statistieken van de afgelopen <?= $days ?> dagen</h1>
<hr>
<section id='analytics'>
	<h2>Meest bezochte pagina's</h2>
	<table>
		<tr>
			<th>Hits</th>
			<th>Pagina</th>
		</tr>
		<?php foreach($top as $item) { ?>
			<tr><td><?= $item['times'] ?></td> <td><?= $item['page'] ?></td></tr>
		<?php } ?>
	</table>
	<hr>
	<h2>Website bezoeken (PHP sessie's)</h2>
	<?= $visits ?>
	<div id="visitsHistory"></div>
	<h2>Website hits (alle views)</h2>
	<?= $hits ?>
	<div id="hitsHistory"></div>
	<div class='left' id='pie'>
		<h2>Browser overzicht</h2>
		<?= $browser ?>
		<div id='browser'></div>
	</div>
	<div class='left'>
		<h2>Platform overzicht</h2>
		<?= $platform ?>
		<div id='platform'></div>
	</div>
	<div class='left'>
		<h2>Bron overzicht</h2>
		<?= $referrer ?>
		<div id='referrer'></div>
	</div>
	<div class='left'>
		<h2>Pagina overzicht</h2>
		<?= $pages ?>
		<div id='pages'></div>
	</div>
</section>