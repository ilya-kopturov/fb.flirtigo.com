<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0, 1);

// .. if own profile .. //
$true_id = @$db->query("SELECT `id` FROM `tblUsers` WHERE `id` = '". (int) $_GET['id']."' LIMIT 1");
if($_GET['id'] == $_SESSION['sess_id'] OR !$true_id)
{
	if(!empty($_SERVER['HTTP_REFERER'])){
		header_location($_SERVER['HTTP_REFERER']);
	}
	header_location($cfg['path']['url_site']);
}
//..end if own profile..//

if(isset($_GET['id']) AND isset($_SESSION['sess_id']))
{
	if($_GET['type'] == 'hot')
	{
		if($_GET['action'] == 'add')
		{
			@$db->query("DELETE FROM `tblHotBlockList` WHERE `user_id` = '" . $_SESSION['sess_id'] . "' AND `friend_user_id` = '" . (int) $_GET['id']."'");
			@$db->query("INSERT INTO `tblHotBlockList` (`user_id`, `friend_user_id`,`type`) VALUES ('" . $_SESSION['sess_id'] . "', '" . (int) $_GET['id'] . "','H')");
		} elseif($_GET['action'] == 'delete')
		{
			@$db->query("DELETE FROM `tblHotBlockList` WHERE `user_id` = '" . $_SESSION['sess_id'] . "' AND `friend_user_id` = '" . (int) $_GET['id']."' AND `type` = 'H'");
		}
	}
	elseif($_GET['type'] == 'block')
	{
		if($_GET['action'] == 'add')
		{
			@$db->query("DELETE FROM `tblHotBlockList` WHERE `user_id` = '" . $_SESSION['sess_id'] . "' AND `friend_user_id` = '" . (int) $_GET['id']."'");
			@$db->query("INSERT INTO `tblHotBlockList` (`user_id`, `friend_user_id`,`type`) VALUES ('" . $_SESSION['sess_id'] . "', '" . (int) $_GET['id'] . "','B')");
		} elseif($_GET['action'] == 'delete')
		{
			@$db->query("DELETE FROM `tblHotBlockList` WHERE `user_id` = '" . $_SESSION['sess_id'] . "' AND `friend_user_id` = '" . (int) $_GET['id']."' AND `type` = 'B'");
		}
	}
}

if(!empty($_SERVER['HTTP_REFERER'])){
	header_location($_SERVER['HTTP_REFERER']);
}

header_location($cfg['path']['url_site']);

include ("./includes/" . "require" . "/" . "site_foot.php");
?>