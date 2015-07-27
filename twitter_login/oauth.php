<?php
session_start();
require_once('twitteroauth/twitteroauth.php');
include('config.php');
include_once('../lib/init.inc');


if(isset($_GET['oauth_token']))
{


	$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_token_secret']);
	$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	if($access_token)
	{
			$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
			$params =array();
			$params['include_entities']='false';
			$content = $connection->get('account/verify_credentials',$params);

			if($content && isset($content->screen_name) && isset($content->name))
			{
				$_SESSION['name']=$content->name;
				$_SESSION['image']=$content->profile_image_url;
				$_SESSION['twitter_id']=$content->screen_name;

				$selectQ = "SELECT user_uid FROM tw_user_list WHERE user_uid = '".$content->screen_name."'";
				$userCheck = execSqlOneCol($selectQ);

				if(empty($userCheck)){
					$query = "insert into tw_user_list value ('','".$content->screen_name."','".$content->name."')";
					$result = execSqlUpdate($query);
				    if($result){
				        header('Location: http://gotostar.cafe24.com/Api_test/index.php'); 
				    }
				} else {
					header('Location: http://gotostar.cafe24.com/Api_test/index.php'); 
				}
				//redirect to main page.
				
			}
			else
			{
				echo "<h4> Login Error </h4>";
			}
	}

else
{

	echo "<h4> Login Error </h4>";
}

}
else //Error. redirect to Login Page.
{

}

?>