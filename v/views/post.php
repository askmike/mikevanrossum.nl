<?php if(true) /* check if admin */ { ?>
<p class=adminBar>
	<a href='<?= $editUrl ?>'>Edit deze pagina</a> 
	/ <a href='./'>Post statistieken</a>
</p>
<div class=clearfix></div>
<?php } ?>
<h1>
	<?= $titel ?>
</h1>
<time class=postTime><?= $dutchdate ?></time>
<div class=clearfix></div>
<?= $bodyHtml ?>
<hr>
<div id=share class='clearfix message'>
	<p>
		Share deze post
	</p>
	<div>
		<a class="socialite facebook ir" href="http://facebook.com/share" data-layout=box_count rel=nofollow target=_blank>
		    Share on Facebook
		</a>
		<a class="socialite twitter ir" href="http://twitter.com/share" data-count=vertical data-via=mikevanrossum rel=nofollow target=_blank>
		    Share on Twitter
		</a>
		<a class="socialite googleplus ir" href="http://google.com/share" data-size=tall rel=nofollow target=_blank>
		    Share on Google+
		</a>
	</div>
</div>
<hr>
<p>
	Op dit moment kan je nog geen comments achterlaten.
</p>