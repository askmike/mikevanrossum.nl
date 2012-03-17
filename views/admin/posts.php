<div class='message' id='addPostLink'><a href='<?= SITE . '/admin/create' ?>'>Voeg een post toe</a></div>
<div class='clearfix'></div>
<h1>
	Overzicht blogposts
</h1>
<div class='clearfix'></div>
<table id='adminBlogPosts'>
	<?php foreach ($data as $item) { if(is_array($item)) { ?>
		<tr>
			<td>
				<time datetime="<?= $item['dutchdate'] ?>">
					<?= $item['dutchdate'] ?>
				</time>
			</td>
			<td>
				<a href="<?= BASE . 'admin/' . $item['url'] ?>" class='blog-post'>
					<?= $item['titel'] ?>
				</a>
			</td>
			<td>
				<?= $item['nOfComments'] ?> comments
			</td>
		</tr>
	<?php } } ?>
</table>