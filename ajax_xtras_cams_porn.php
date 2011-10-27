<?php
/* $Id$ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

dfcams();

$smarty->assign("camsHour", (($_SESSION['porncams']['hour'] < 9) ? "0" : "") . $_SESSION['porncams']['hour'] .":" . date("i") . ":" . date("s"));

$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "xtras_cams_porn.tpl");
?>