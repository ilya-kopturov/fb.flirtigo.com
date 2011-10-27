<?php


*/
define("IN_MAINSITE", TRUE);

include ("../includes/" . "require" . "/" . "site_head.php");


$smarty->display( $cfg['template']['dir_template'] . "public/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "upapprove.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "footer.tpl" );
include ("../includes/" . "require" . "/" . "site_foot.php");
?>
