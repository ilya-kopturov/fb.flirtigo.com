<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 2);

if( (int) $_GET['id'] > 0 )
{
	$to_id = @$db->get_row("SELECT `id` FROM `tblUsers` WHERE `id` = '" . (int) $_GET['id'] . "' LIMIT 1");
	
	if($to_id['id'] > 0)
	{
		mailermachine($db,'emailnotif','inviteprofile','internal',(int)$_GET['id'],$_SESSION['sess_id']);
		mailermachine($db,'emailnotif','inviteprofile','external',(int)$_GET['id'],$_SESSION['sess_id']);
		
		$msg = "Invitation was succesfully sent!";
	}
	else
	{
		$error = "User was not found in our database!";
	}
}


if(!empty($_SERVER['HTTP_REFERER'])){
	header_location($_SERVER['HTTP_REFERER'] . "&msg=" . urlencode($msg) . "&error=" . urlencode($error));
}

header_location($cfg['path']['url_site'] . "mem_profile.php?id=" . (int) $_GET['id']);

include ("./includes/" . "require" . "/" . "site_foot.php");
?>