<?php
include_once "../lib/init.inc";
$aReturn = array("status" => 400, "data" => "");
session_start();
switch ($_REQUEST['type']) {
	case "insert" :

	$userUid = $_REQUEST['userINFO']['id'];
	$userName = $_REQUEST['userINFO']['name'];
	$selectQ = "SELECT user_uid FROM fb_user_list WHERE user_uid = '".$userUid."'";
	$userCheck = execSqlOneCol($selectQ);
	
	$_SESSION['name'] = $userName;
	$_SESSION['uid'] = $userUid;
	$_SESSION['login_type'] = 'facebook';

	if(empty($userCheck)){
		$query = "insert into fb_user_list value ('','".$userUid."','".$userName."')";
		$result = execSqlUpdate($query);
	    if($result){
	        $aReturn = array("status"=>200, "data"=>$result);
	    }else{
	        $aReturn = array("status"=>500, "data"=>$query);
	    }
	} else {
		$aReturn = array("status"=>200, "data"=>$_SESSION['name']);
	}

	break;

	default :
	break;

}
echo json_encode($aReturn);
?>