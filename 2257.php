<?php
define("IN_MAINSITE", TRUE);

include ("includes/require/site_head.php");

$smarty->assign('tabname', $_GET['tabname']);

$smarty->display( $cfg['template']['dir_template'] . "public/" . "2257.tpl" );

include ("includes/require/site_foot.php");
?>