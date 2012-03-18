<?php if(ANALYTICS != 'true' && LIVE == false) /* check if admin and if dev version */ { ?>
<p class='adminBar'>
	<a href='<?= SITE . 'analytics/' . $url ?>'>Post statistieken</a>
	\
	<a href='<?= $editUrl ?>'>Edit deze pagina</a> 
</p>
<div class='clearfix'></div>
<?php } elseif(LIVE == false) { ?>
<p class='adminBar'>
	<a href='<?= SITE . $url ?>'>Terug naar de Post</a>
	\
	<a href='<?= $editUrl ?>'>Edit deze pagina</a> 
</p>
<div class='clearfix'></div>
<section id="postAnalytics">	
	<h1>Post bezoeken afgelopen 20 dagen:</h1>
	<?= $analytics ?>
	<div id="hitsHistory"></div>
</section>	
<?php } ?>
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
<hr>
<p>
	<?php if (!sizeof($comments)) { ?>
	No comments yet.
	<?php } elseif (sizeof($comments) == 1) { ?>
	One comment:
	<?php } else { 
	echo sizeof($comments) ?> comments:
	<?php } ?>
</p>

<?php 
if($comments) {
	foreach ($comments as $comment) { ?>
	<section class='comment' id='comment-<?= $comment['id'] ?>'>
		<h1>
			<?php if(!$comment['website']) { 
				echo $comment['name'];
			} else {
				echo '<a href="' . $comment['website'] . '" rel="nofollow">' . $comment['name'] . '</a>';
			} ?>
		</h1>
		<div class='commentMeta'>
			<span class='reply'>
				<a href='#commentForm' data-name='<?= $comment['name'] ?>' data-perm='comment-<?= $comment['id'] ?>'>Reply</a>
				&#8212;
			</span>
			<a class='date' href='#comment-<?= $comment['id'] ?>'><?= $comment['humandate'] ?></a>
		</div>
		<div class='clearfix'></div>
		<p>
			<?= $comment['comment'] ?>
		</p>
		<div class='clearfix'></div>
	</section>
<?php }
} ?>


<form id='commentForm' method='post' class='form'>
	<h2>
		Leave your comment
	</h2>
	<input type="hidden" name="post" value="<?= $url ?>" />
	<input type="hidden" name="session" value="<?= session_id() ?>" />
	<p>
		<label for="author">
			Name*
		</label>
		<input type="text" name="author" id="author" />
	</p>
	<p>
		<label for="email">
			Email address*
		</label>
		<input type="text" name="email" id="email" />
	</p>
	<p>
		<label for="url">
			Website
		</label>
		<input type="text" name="url" id="url" />
	</p>
	<p>
		<textarea name="comment"></textarea>
	</p>
	<p>
		<span>
			Wrap code in <code>&lt;pre&gt;</code> tags. 
			<a rel='nofollow' id='markdownLink' href='http://daringfireball.net/projects/markdown/syntax'>Markdown</a>
			is allowed, HTML outside <code>&lt;pre&gt;</code>&#8217;s is not.
		</span>
	</p>
	<p>
		<input name="submit" type="submit" class="submit" tabindex="5" value="Comment" />
	</p>
</form>
<?php /* */ ?>
