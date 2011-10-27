<?php
/* $Id$ */

/* DIRTYFLIRTING.COM */

define("IN_MAINSITE", TRUE);

include ("includes/require/site_head.php");
check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);
if($_SESSION['sess_accesslevel']<2){
	header("Location: upgrade/index.php");
	exit;
}
/*...smarty...*/
//$_SESSION["QUERY_STRING"]=$_SERVER["QUERY_STRING"];

$smarty->register_function('screenname', 'smarty_screenname');
$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "bonus_new.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );
/*..end smarty..*/

include ("./includes/" . "require" . "/" . "site_foot.php");
?>
