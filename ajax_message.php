<?php
/* $Id: ajax_message.php 350 2008-05-23 19:06:51Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], isset($_GET['detail']) ? MESSAGING : 0);

$email = $db->get_row("SELECT * FROM `tblMails`
                                     WHERE `user_id` = '".$_SESSION['sess_id']."' AND
                                           `id` = '$_GET[id]' LIMIT 1");

if (isset($_GET['detail'])) {
/* ... sql ...*/
	$update_new = @$db->query("UPDATE `tblMails` SET `new` = 'N' WHERE `id`       = '" . (int) $_GET['id'] ."' AND `user_to` = '".$_SESSION['sess_id']."'");
	$update_new = @$db->query("UPDATE `tblMails` SET `new` = 'N' WHERE `id_to_id` = '" . (int) $_GET['id'] ."' AND `user_to` = '".$_SESSION['sess_id']."'");
/*...end sql...*/
}

$smarty->register_function('screenname', 'smarty_screenname');
$smarty->assign("email", $email);
$template = $cfg['template']['dir_template'] . "ajax/" . (isset($_GET['detail']) ? "mail_message_detail.tpl" : "mail_message_simple.tpl");
$smarty->display($template);
