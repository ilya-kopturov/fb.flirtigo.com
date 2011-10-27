<?php
define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0, 1);

$smarty->display("{$cfg['template']['dir_template']}ajax/mail_type.tpl");