<?php
/* $Id: ajax_mail_folder.php 542 2008-06-13 18:36:42Z bogdan $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

$f = (empty($_GET['f']) || !(in_array($_GET['f'], range(1, 5)))) ? 1 : $_GET['f'];

if (strcmp($_GET['u'], 't') == 0) {
	$ids = array();
	if (is_array($_GET['del'])) foreach($_GET['del'] as $id) $ids[] = (int)$id;
	$ids = implode(', ', $ids);
	if ($f == 3 || $f == 5) {
		$db->query("DELETE FROM tblMails WHERE id IN ($ids) AND user_id = '{$_SESSION['sess_id']}'");
		$db->query("DELETE FROM tblMailAttachments WHERE email_id IN ($ids)");
	} else {
		$db->query("UPDATE tblMails set folder = '3' WHERE id IN ($ids) AND user_id = '{$_SESSION['sess_id']}'");
	}
}

if ($f == 4) {
	$emails = $db->get_var("SELECT COUNT(*) FROM tblMails WHERE user_id = '{$_SESSION['sess_id']}' AND folder = '1' AND type = 'F'");
} else {
	$emails = $db->get_var("SELECT COUNT(*) FROM tblMails WHERE user_id = '{$_SESSION['sess_id']}' AND folder = '$f' AND type != 'F'");
}

$smarty->register_function('screenname', 'smarty_screenname');

$smarty->assign("folder", $f);
$smarty->assign("folders", $cfg['mail']['folders']);
$smarty->assign("emails", $emails);
$smarty->display("{$cfg['template']['dir_template']}ajax/mail_folder.tpl");