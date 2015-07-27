<?php
include_once "db.php";
include_once "curl.php";
switch ($_SERVER["HTTP_HOST"]) {
	case "gotostar.cafe24.com":
	/* facebook */
		define("APP_ID", "999989523366320"); // APP ID
		define("APP_SECRET", "2dd32aecaa1515c82e69823ea98affbd"); // APP SECRET CODE

	/* twitter */
		define('Consumer_Key','bNNy1qRsCPgOdaNfwzqBxOTTq');
		define('Consumer_Secret','1eAGbK8CZ9YPcE7cjomPIXFbIGjEKj58tjzqalvsGgzJtnEuf7');
		break;
}

define('PERMS', 'email, manage_pages, read_insights, read_page_mailboxes, publish_pages');
define('ACCESS_TOKEN', 'CAAGau99vHiIBAEQehCIQXfag9LVG5hMddLtA43NaKJV79b9eiX2KGJBlt5kTIZAWUgOvGTfeo2QoUbYLUJ2X5wXnd5GBZBoj6qYHGAZCIgJ39QN6cQlbd7p7CZBrvpeXWFYocbgqwWjwdsntA3ZBsWIil67QCP5rJmZCKlw5HCcYWLEC5yPnE3sTzElNefFM4dqJ5lA8UpkKVmryaTwLiH');

$currentTime = strtotime(date("Y-m-d H:i:s")); //cache
$thisPageName = substr_replace(basename($_SERVER['PHP_SELF']),"",-4);
session_start(); //세션
?>