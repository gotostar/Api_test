<?php
include_once "db.php";
include_once "curl.php";
switch ($_SERVER["HTTP_HOST"]) {
	case "gotostar.cafe24.com":
		define("APP_ID", "999989523366320"); // APP ID
		define("APP_SECRET", "2dd32aecaa1515c82e69823ea98affbd"); // APP SECRET CODE
		break;
}

define('PERMS', 'email, manage_pages, read_insights, read_page_mailboxes, publish_pages');
define('ACCESS_TOKEN', 'CAAGau99vHiIBAEQehCIQXfag9LVG5hMddLtA43NaKJV79b9eiX2KGJBlt5kTIZAWUgOvGTfeo2QoUbYLUJ2X5wXnd5GBZBoj6qYHGAZCIgJ39QN6cQlbd7p7CZBrvpeXWFYocbgqwWjwdsntA3ZBsWIil67QCP5rJmZCKlw5HCcYWLEC5yPnE3sTzElNefFM4dqJ5lA8UpkKVmryaTwLiH');

//인스타그램
define('INSTAGRAM_KEY', '6ce4523ed3be468798ecba17b9761675');
define('INSTAGRAM_TOKEN', '1173129199.8c6352e.6e729a0663d34a93a2d8ded460e39496');

// define('SETTING_URL', 'http://dev.innobirds.com/kia/');


$currentTime = strtotime(date("Y-m-d H:i:s")); //cache
$thisPageName = substr_replace(basename($_SERVER['PHP_SELF']),"",-4);
session_start(); //세션
?>
