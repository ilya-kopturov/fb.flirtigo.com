<?php
/* $Id: ajax_read_message.php 544 2008-06-13 19:07:44Z root $ */

define("IN_MAINSITE", true);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

$email = $db->get_row("SELECT * FROM tblMails WHERE user_id = '{$_SESSION['sess_id']}' AND id = '{$_GET['id']}' LIMIT 1");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], (($email['type'] == 'F') || ($_SESSION['sess_id'] == $email['user_from']) || ($email['folder'] == 5)) ? 0 : MESSAGING);

$attachments = $db->get_results("SELECT * FROM tblMailAttachments WHERE email_id = '{$email['id']}'");

$db->query("UPDATE tblMails SET new = 'N' WHERE id = '{$_GET['id']}' AND user_id = '{$_SESSION['sess_id']}'");
$db->query("UPDATE tblMails SET new = 'N' WHERE id_to_id = '{$_GET['id']}' AND user_id = '{$_SESSION['sess_id']}'");

$smarty->register_function('screenname', 'smarty_screenname');
$smarty->assign("folder", $cfg['mail']['folders'][$_GET['f']]);
$smarty->assign("folder_order", $cfg['mail']['folder_order']);
$smarty->assign("attachments", $attachments);
$smarty->assign("email", $email);
if($email['folder'] == 5){
	$smarty->display("{$cfg['template']['dir_template']}ajax/mail_message_siteannounce.tpl");
}else{
	$smarty->display("{$cfg['template']['dir_template']}ajax/mail_message_detail.tpl");
}
