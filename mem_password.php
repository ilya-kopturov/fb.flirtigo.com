<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

/* ... form submit ... */
if(isset($_POST['submit_x']) or isset($_POST['submit_y'])){
	if(trim($_POST['new_password']) == trim($_POST['retype_password']) AND strlen(trim($_POST['new_password'])) > 4)
	{
		$curr_pass = @$db->query("SELECT `pass` FROM `tblUsers` WHERE `id` = '" . $_SESSION['sess_id'] . "' AND `pass` = '" . addslashes(trim($_POST['current_password'])) . "' LIMIT 1");
		if($curr_pass > 0){
				@$db->query("UPDATE `tblUsers` SET `pass` = '" . addslashes(trim($_POST['new_password'])) ."' 
				                               WHERE `id` = '" . $_SESSION['sess_id'] . "'
	                                           LIMIT 1");
				$msg = "Password Changed!";
		} else {
				$error = "Passwords do not match!";
		}
		
		
	}
	else
	{
		$error = "Passwords do not match!";
	}
}
/* ..end form submit.. */


/* ... sql ... */


/* ..end sql.. */

/* ... assign ... */


$smarty->assign("error", $error);
$smarty->assign("msg", $msg);

$smarty->assign("countries", $cfg['countries']);
$smarty->assign("states",    $cfg['states']);
/* ..end assign.. */

/* ... smarty ... */
$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "password.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );
/* ..end smarty.. */

include ("./includes/" . "require" . "/" . "site_foot.php");
?>