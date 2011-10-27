<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], $access = strpos($_SERVER['HTTP_REFERER'],'mem_mostwanted.php')>0?0:1);

if(isset($_GET['id']) AND isset($_GET['f']) AND $_GET['f'] > 0 AND $_GET['id'] != $_SESSION['sess_id'])
{
	if(@$db->get_var("SELECT COUNT(*) FROM `tblRatePlugin` WHERE `user_id` = '". (int) $_GET['id']."' AND `ip` = '".$_SERVER['REMOTE_ADDR']."' and `date` = '".date("Y-m-d")."'") == 0)
	{
		@$db->query("INSERT INTO `tblRatePlugin` (`user_id`, `rate`,`ip`,`date`) VALUES ('" . (int) $_GET['id'] . "', '" . (int) $_GET['f'] . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW())");
		@$db->query("UPDATE `tblMembersClub` SET `votes` = `votes` + 1, `rate` = `rate` + ". (int) $_GET['f']." WHERE `id` = '". (int) $_GET['id']."' LIMIT 1");
	}
}

if(!empty($_SERVER['HTTP_REFERER'])){
	//header_location($_SERVER['HTTP_REFERER'] . "#Adult_Sites");
	echo "<script type=\"text/javascript\">setTimeout(window.location='" . $_SERVER['HTTP_REFERER'] . "#Adult_Sites'" . ",0)</script>";
	exit;
}

header_location();

include ("./includes/" . "require" . "/" . "site_foot.php");
?>