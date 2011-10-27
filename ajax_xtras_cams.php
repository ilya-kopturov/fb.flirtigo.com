<?php
/* $Id$ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

//print_r($_SESSION);

dfcams();

$smarty->assign("camsHour", (($_SESSION['cams']['hour'] < 9) ? "0" : "") . $_SESSION['cams']['hour'] .":" . date("i") . ":" . date("s"));

$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "xtras_cams.tpl");
?>