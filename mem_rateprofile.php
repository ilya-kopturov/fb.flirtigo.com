<?php
/* DIRTYFLIRTING.COM */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], $access = strpos($_SERVER['HTTP_REFERER'],'mem_mostwanted.php')>0?0:1);

if(isset($_GET['id']) AND isset($_GET['f']) AND $_GET['f'] > 0 AND $_GET['id'] != $_SESSION['sess_id'])
{
	if(@$db->get_var("SELECT COUNT(*) FROM `tblTempRate` WHERE `user_id` = '". (int) $_GET['id']."' AND `ip` = '".$_SERVER['REMOTE_ADDR']."' and `date` = '".date("Y-m-d")."'") == 0)
	{
		$rateDetails = $db->get_row("SELECT `rating`, `votes` 
		                             FROM   `tblUsers`
		                             WHERE  `id` = '" . (int) $_GET['id']. "'
		                             LIMIT 1");
		
		$userVotes  = $rateDetails['votes'] + 1;
		$userSumRating = (float) (($rateDetails['rating']*$rateDetails['votes']) + (int)$_GET['f']);
		$userRating    = (float) ($userSumRating / $userVotes); 
		@$db->query("INSERT INTO `tblTempRate` (`user_id`, `rate`,`ip`,`date`) VALUES ('" . (int) $_GET['id'] . "', '" . (int) $_GET['f'] . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW())");
		@$db->query("UPDATE `tblUsers` SET `votes` = '".(int) $userVotes."', `rating` = '". (float) $userRating ."' WHERE `id` = '". (int) $_GET['id']."' LIMIT 1");
	}
}

if(!empty($_SERVER['HTTP_REFERER'])){
	header_location($_SERVER['HTTP_REFERER']);
}

header_location();

include ("./includes/" . "require" . "/" . "site_foot.php");
?>