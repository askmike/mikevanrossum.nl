<h1>Website statistieken van de afgelopen <?= $days?> dagen</h1>
<p>
	Hier zie je de statistieken van mijn website. Ik heb zelf de javascript 
	<a href='https://github.com/askmike/mikevanrossum.nl/blob/master/static/js/script.js#L372'>geschreven</a> 
	die de statistieken opslaat.
	Ook heb ik de PHP 
	<a href='https://github.com/askmike/mikevanrossum.nl/blob/master/core/models/analyticsModel.php'>geschreven</a> 
	die alles omrekent naar de gegevens die je hier ziet.
</p>
<p>
	Ik heb de grafische weergave van deze data (de grafieken/tabellen) <strong>NIET</strong> zelf geschreven. Het zijn 
	<a href='http://raphaeljs.com/'>Raphaël</a> plugins.
	Hier zijn de 
	<a href='http://raphaeljs.com/analytics.html'>linechart</a> 
	en de 
	<a href='http://g.raphaeljs.com/piechart2.html'>piechart</a>.
	Ik heb ze wel zwaar moeten 
	<a href='https://github.com/askmike/mikevanrossum.nl/blob/master/static/js/mylibs/raphael/script.js'>aanpassen</a> 
	voordat ze dynamisch met deze data om konden gaan.
</p>
<p>
	<em>
		De 1052 hits van 17 januari is correct, het overgrote deel hiervan zijn alle studenten die de dag voor het DFI tentamen 
		<a href='<?= BASE . 'blog/2012/01/globale-samenvatting-voor-tentamen-dfi/' ?>'>mijn samenvatting</a>
		hebben gebruikt. Het andere deel kwam van mij terwijl ik op de live versie zat te ontwikkelen.
	</em>
</p>
<hr>
<p>
	<form id='days'>
	Statistieken van hoeveel dagen:
	<input id='nOfDays'>
	<input type='submit' name='submit'>
</p>
<hr>
<section id='analytics'>
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