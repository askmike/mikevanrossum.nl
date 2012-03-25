<h1>
	<?= $titel ?>
</h1>
<time class='postTime'><?= $humandate ?></time>
<div class='clearfix'></div>
<?= $bodyHtml ?>
<hr>
<div id='share' class='clearfix message'>
	<p>
		Share this post
	</p>
	<ul class='clearfix'>
		<li>
			<a class="socialite facebook ir" href="http://facebook.com/share" data-layout="box_count" rel="nofollow" data-href='<?= SITE . $url ?>' target="_blank">
			    Share on Facebook
			</a>
		</li>
		<li>
			<a class="socialite twitter ir" href="http://twitter.com/share" data-count="vertical" data-via="mikevanrossum" rel="nofollow" target="_blank">
			    Share on Twitter
			</a>
		</li>
		<li>
			<a class="socialite googleplus ir" href="http://google.com/share" data-size="tall" rel="nofollow" target="_blank">
			    Share on Google+
			</a>
		</li>
	</ul>
</div>