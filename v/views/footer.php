</div>

<div id='php' data-session='<?= session_id() ?>' data-time='<?= round( (microtime( true ) - STARTTIME)*1000, 4 )?>' data-base='<?= BASE ?>'></div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery||document.write('<script src="<?= BASE ?>static/js/libs/jquery-1.7.1.min.js"><\/script>');</script>


<script defer src='<?php echo BASE ?>static/js/37488f733692cc86df5c14dbe3ffaae9fc708c08.js'></script>


<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})});</script><![endif]-->
</body>
</html>
<!--# <?= 'page served in: ' . round( (microtime( true ) - STARTTIME), 5 ) . ' seconds' ?> -->