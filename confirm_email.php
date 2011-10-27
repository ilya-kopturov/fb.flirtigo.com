<?php
/* $Id: confirm_email.php 400 2008-05-31 02:16:05Z andi $ */

define("IN_MAINSITE", TRUE);

include ("includes/require/site_head.php");

$code = $_SERVER['QUERY_STRING'];

$confirmation = $db->get_row("SELECT * FROM tblEmailConfirmation WHERE code = '$code' LIMIT 1");
if ($confirmation) {
	$db->query("UPDATE tblUsers SET email = '{$confirmation['email']}' WHERE id = '{$confirmation['user_id']}' LIMIT 1");
	$db->query("DELETE FROM tblEmailConfirmation WHERE id = '{$confirmation['id']}'");
}

$smarty->assign('confirmed', count($confirmation));

$smarty->display("{$cfg['template']['dir_template']}public/header.tpl" );
$smarty->display("{$cfg['template']['dir_template']}public/confirm_email.tpl" );
$smarty->display("{$cfg['template']['dir_template']}public/footer.tpl" );

include ("includes/require/site_foot.php");