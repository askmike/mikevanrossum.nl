<h1>
	Maak een nieuwe post aan
</h1>
<?php if(LIVE == true) { ?>
<p class='message'>
	Dit is de online versie van mijn website, ivm. beveiliging word je post niet aangemaakt.
	Ik ben nu bezig dit systeem te <a href='https://github.com/askmike/mikevanrossum.nl'>ontwikkelen</a> voor het vak 
	<a href='http://intra.iam.hva.nl/content/1112/verdieping1/server_side_scripting//intro-en-materiaal/'>Server Side Scripting</a>.
</p>
<?php } ?>
<form id='createPost' method='post'>
	<input id='editTitle' name='titel'>
	<div class='clearfix'></div>
	<span id='slugLink'><?= SITE . 'blog/' ?></span>
	<input id='slug' name='url'>
	<div class='clearfix'></div>
	<p>
		Wanneer? <br>
		<em>
			(leeg = nu) / anders een string voor 
			<a target='blank' href='http://php.net/manual/en/function.strtotime.php#example-668'>strtotime</a>
		</em>
	</p>
	<input name='time' id='postTime'>
	<div class='clearfix'></div>
	<input type='submit' name='submit' class='right' id='submitPost' value='maak'>
</form>