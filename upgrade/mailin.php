<?php
/* DIRTYFLIRTING.COM


                                                                                         */

define("IN_MAINSITE", TRUE);

include ("../includes/" . "require" . "/" . "site_head.php");


check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "mailin.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );
include ("../includes/" . "require" . "/" . "site_foot.php");
?>
