<?php

define('CRON',true);

$path = dirname(__FILE__);

// this prefix makes it possible to require while cron'ing this
// because the cron session has it's own working dir (screws up relative paths)
require $path . '/../core/config.php';

// this is not working somehow, I'll do it manually for now
// require dirname(__FILE__) . '/../core/lazyloading.php';
require $path . '/../core/models/database.php';
require $path . '/../core/models/dBmodel.php';

//tweet
require $path . '/../core/models/tweetModel.php';
require $path . '/fetchTweets.php';
//mijnrealiteit
require $path . '/../core/models/mijnrealiteitModel.php';
require $path . '/fetchMijnrealiteit.php';

?>