<?php

define('CRON',true);

// this prefix makes it possible to require while cron'ing this
// because the cron session has it's own working dir (screws up relative paths)
require dirname(__FILE__) . '/../core/config.php';

// this is not working somehow, I'll do it manually for now
// require dirname(__FILE__) . '/../core/lazyloading.php';

require dirname(__FILE__) . '/../core/models/dBmodel.php';

//tweet
require dirname(__FILE__) . '/../core/models/tweetModel.php';
require dirname(__FILE__) . '/fetchTweets.php';
//mijnrealiteit
require dirname(__FILE__) . '/../core/models/mijnrealiteitModel.php';
require dirname(__FILE__) . '/fetchMijnrealiteit.php';

?>