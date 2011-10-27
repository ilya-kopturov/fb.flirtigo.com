<?php
/* $Id: login.php 343 2008-05-20 19:32:51Z andi $ */

function check_session($db, $check_password, $check_username, $check_access = 0)
{
	global $cfg;

    if(!$db->get_var("SELECT `id` FROM `tblUsers` WHERE `screenname` = '".$check_username."' AND `pass` = '".$check_password."' AND `disabled` = 'N'"))
    {
        $_SESSION = array();
    	session_destroy();

    	if (strcmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'XMLHttpRequest') == 0) die("You need to <a href='{$cfg['path']['url_site']}'>login</a> to use this function or <a href='{$cfg['path']['url_site']}join.php'>join</a> now.");
    	header("Location: " . $cfg['path']['url_site'] . "?error=Your session has expired. Please login again.");
    	exit;
    }
    else
    {
    	if ($check_access && !LiveUser::isAllowed($check_access))
    	{
    		/*if((int) $check_access == 2 AND (int) $_SESSION['sess_accesslevel'] == 1){
    	    	header("Location: " . $cfg['path']['url_upgrade'] . "index2.php?id=" . $_SESSION['sess_id']);
    	    	exit;
    		}*/

    		if(isset($_GET['id']) and (int) strpos($_SERVER['REQUEST_URI'],'sendmail.php') > 0)
    		{
    			$location = $cfg['path']['url_upgrade'] . "index.php?uid=".$_SESSION['sess_id']."&pass=".$check_password."&user=".$check_username."&pid=" . (int) $_GET['id'];
    		}
    		 elseif(isset($_GET['e_id']) and (int) $_GET['e_id'] > 0 and strpos($_SERVER['REQUEST_URI'],'readmail.php') > 0)
    		{
    			$user_from = $db->get_var("SELECT `user_from` FROM `tblMails` WHERE `tblMails`.`id` = '". (int) $_GET['e_id']."' AND `user_id` = '".$_SESSION['sess_id']."'");

    			if($user_from == $_SESSION['sess_id']){
    				$user_from = $db->get_var("SELECT `user_to` FROM `tblMails` WHERE `tblMails`.`id` = '". (int) $_GET['e_id']."' AND `user_id` = '".$_SESSION['sess_id']."'");
    			}

    			$location = $cfg['path']['url_upgrade'] . "index.php?uid=".$_SESSION['sess_id']."&pass=".$check_password."&user=".$check_username."&pid=" . (int) $user_from;
    		}
    		elseif(strpos($_SERVER['REQUEST_URI'],'read_message.php') > 0)
    		{
    			$user_from = $db->get_var("SELECT `user_from` FROM `tblMails` WHERE `tblMails`.`id` = '". (int) $_GET['id']."' AND `user_id` = '".$_SESSION['sess_id']."'");

    			if($user_from == $_SESSION['sess_id']){
    				$user_from = $db->get_var("SELECT `user_to` FROM `tblMails` WHERE `tblMails`.`id` = '". (int) $_GET['id']."' AND `user_id` = '".$_SESSION['sess_id']."'");
    			}
    			$location = $cfg['path']['url_upgrade'] . "index.php?uid=".$_SESSION['sess_id']."&pass=".$check_password."&user=".$check_username."&pid=" . (int) $user_from;
    		}
    		elseif(strpos($_SERVER['REQUEST_URI'],'public_pictures.php') > 0)
    		{
    			$location = $cfg['path']['url_upgrade'] . "index.php?uid=".$_SESSION['sess_id']."&pass=".$check_password."&user=".$check_username."&pid=" . (int) $_GET['id'];
    		}
    		elseif(strpos($_SERVER['REQUEST_URI'],'public_videos.php') > 0)
    		{
    			$location = $cfg['path']['url_upgrade'] . "index.php?uid=".$_SESSION['sess_id']."&pass=".$check_password."&user=".$check_username."&pid=" . (int) $_GET['id'];
    		}
    		elseif(strpos($_SERVER['REQUEST_URI'],'private_gallery.php') > 0)
    		{
    			$location = $cfg['path']['url_upgrade'] . "index.php?uid=".$_SESSION['sess_id']."&pass=".$check_password."&user=".$check_username."&pid=" . (int) $_GET['id'];
    		}
    		elseif(strpos($_SERVER['REQUEST_URI'],'message_new.php') > 0)
    		{
    			$location = $cfg['path']['url_upgrade'] . "index.php?uid=".$_SESSION['sess_id']."&pass=".$check_password."&user=".$check_username."&pid=" . (int) $_GET['id'];
    		}
    		elseif(strpos($_SERVER['REQUEST_URI'],'message_reply.php') > 0)
    		{
    			$user_from = $db->get_var("SELECT `user_from` FROM `tblMails` WHERE `tblMails`.`id` = '". (int) $_GET['id']."' AND `user_id` = '".$_SESSION['sess_id']."'");

    			$location = $cfg['path']['url_upgrade'] . "index.php?csid=".session_i."&pid=" . (int) $user_from;
    		}
    		else
    		{
    			$location = $cfg['path']['url_upgrade'] . "index.php";
    		}
    		if ($location) {
    			if (strcmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'XMLHttpRequest') == 0) {
    				print "<script>window.location.href = '$location'</script>";
    			} else {
    				header("Location: $location");
    			}
    			exit;
    		}
    	}
    }
}
?>