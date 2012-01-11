<form id='editPost' method='post'>
	<input name='title' id='editTitle' value='<?= $titel ?>'>
	<p>
		url: <a href='<?= BASE . $url ?>' target='_blank'><?= BASE . $url ?></a><br>
		datum: <?= $dutchdate ?>
	</p>
	<textarea name='content' id='editContent'><?= $bodyMd ?></textarea>
	<div class='labeledInput'>
		<p>tags</p>
		<input name='tags' id='tags' value='<?= $tags ?>'>
	</div>
	<input type='submit' name='submit' class='right' id='submitPost'>
</form>