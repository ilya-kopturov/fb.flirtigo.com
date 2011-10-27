<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], $access = strpos($_SERVER['HTTP_REFERER'],'mem_mostwanted.php')>0?0:1);

if(isset($_GET['plugin_id']) AND isset($_GET['action']) AND (int) $_GET['plugin_id'] > 0 )
{
	if( $_GET['action'] == "add"){
		if(@$db->get_var("SELECT COUNT(*) FROM `tblFavoritePlugins` WHERE `user_id` = '". (int) $_SESSION['sess_id']."'") <= 4)
		{
			@$db->query("INSERT INTO `tblFavoritePlugins` (`user_id`, `plugin_id`) VALUES ('" . (int) $_SESSION['sess_id'] . "', '" . (int) $_GET['plugin_id'] . "')");
		}
	}elseif($_GET['action'] == "del"){
			@$db->query("DELETE FROM `tblFavoritePlugins` WHERE `user_id` = '" . (int) $_SESSION['sess_id'] . "' AND `plugin_id` = '" . (int) $_GET['plugin_id'] . "' LIMIT 1");
	}
}

if(!empty($_SERVER['HTTP_REFERER'])){
	header_location($_SERVER['HTTP_REFERER']);
}

header_location();

include ("./includes/" . "require" . "/" . "site_foot.php");
?>