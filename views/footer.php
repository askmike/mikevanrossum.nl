</div>
<div class='clearfix'></div>
<footer class='center'>
	<a rel='nofollow' href='http://twitter.com/mikevanrossum'>@mikevanrossum</a> 
	/ 
	<a class='email' href='#'>#</a>
</footer>
<!-- this is the last piece of content before the scripts, it stores every PHP var I need in my js-->
<div id='php' data-session='<?= session_id() ?>' data-time='<?= round( (microtime( true ) - STARTTIME)*1000, 4 )?>' data-base='<?= BASE ?>'></div>
<!-- JavaScript at the bottom for fast page loading -->

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= BASE ?>static/js/libs/jquery-1.7.1.min.js"><\/script>')</script>


<!-- scripts concatenated and minified via ant build script-->
<script defer src="<?= BASE ?>static/js/plugins.js"></script>
<script defer src="<?= BASE ?>static/js/mylibs/track.js"></script>
<script defer src="<?= BASE ?>static/js/script.js"></script>
<!-- end scripts-->

<?php if(ANALYTICS == 'true') { ?>
<script defer src="<?= BASE ?>static/js/libs/raphael.js"></script>
<script defer src="<?= BASE ?>static/js/libs/raphael-script.js"></script>
<?php } ?>
<?php if($script) { ?>
<script defer src="<?= BASE ?>static/js/libs/<?= $script ?>.js"></script>
<?php } ?>
<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->
</body>
</html>
<!--# <?= 'page served in: ' . round( (microtime( true ) - STARTTIME), 5 ) . ' seconds' ?> -->