<?php if(true) { ?>
<p class='adminBar'>
	<a href='<?= $editUrl ?>'>Edit deze pagina</a> 
	/ <a href='./'>Post statistieken</a>
</p>
<div class='clearfix'></div>
<?php } ?>
<h1>
	<?= $titel ?>
</h1>
<time class='postTime'><?= $dutchdate ?></time>
<div class='clearfix'></div>
<?= $bodyHtml ?>
<hr>
<p>
	Op dit moment kan je nog geen comments achterlaten.
</p>