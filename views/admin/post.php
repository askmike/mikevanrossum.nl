<form id='editPost' method='post'>
	<?php if(LIVE == true) { ?>
	<p class='message'><em>Dit is de online versie van mijn website, ivm. beveiliging worden je wijzigingen niet doorgevoerd.</em></p>
	<?php } ?>
	<input name='title' id='editTitle' value='<?= $titel ?>'>
	<p>
		url: <a href='<?= $url ?>' target='_blank'><?= $url ?></a><br>
		datum: <?= $dutchdate ?><br>
		<a href='http://tech.thingoid.com/download/PHPMarkdownExtraSyntaxSummary1.0.1.pdf' target='_blank'>Markdown cheatsheet</a>
	</p>
	<textarea name='content' id='editContent'><?= $bodyMd ?></textarea>
	<div class='labeledInput'>
		<p>tags</p>
		<input name='tags' id='tags' value='<?= $tags ?>'>
	</div>
	<input type='submit' name='submit' class='right' id='submitPost'>
</form>