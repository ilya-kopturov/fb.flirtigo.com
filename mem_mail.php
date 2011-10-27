<?php
/* $Id: mem_mail.php 522 2008-06-06 22:30:57Z andi $ */

define("IN_MAINSITE", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

$db->query("UPDATE tblUsers SET mailopened = 'Y' WHERE mailopened = 'N' AND id = '{$_SESSION['sess_id']}' ORDER by id ASC LIMIT 1");

$smarty->display("{$cfg['template']['dir_template']}login/header.tpl");
$smarty->display("{$cfg['template']['dir_template']}login/mail.tpl");
$smarty->display("{$cfg['template']['dir_template']}login/footer.tpl");

include ("includes/require/site_foot.php");
