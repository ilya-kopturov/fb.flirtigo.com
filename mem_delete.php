<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

/* ... form submit ... */
if(isset($_POST['submit_x']) or isset($_POST['submit_y'])){
	$del_account = @$db->query("UPDATE `tblUsers` SET `disabled` = 'Y' WHERE `id`    = '" . $_SESSION['sess_id'] . "'       AND  
	                                                                         `pass`  = '" . addslashes(trim($_POST['password'])) . "'   AND  
	                                                                         `email` = '" . addslashes(trim($_POST['email'])) . "' LIMIT 1");
	if($del_account){
		$msg = "Your account was succesfully deleted from our database!";
	}else{
		$error = "Invalid email or password! Account was not deleted.";
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
$smarty->display( $cfg['template']['dir_template'] . "login/" . "delete.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );
/* ..end smarty.. */

include ("./includes/" . "require" . "/" . "site_foot.php");
?>