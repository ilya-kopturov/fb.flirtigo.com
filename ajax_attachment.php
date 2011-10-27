<?php
/* $Id: ajax_attachment.php 528 2008-06-12 15:27:14Z andi $ */

define("IN_MAINSITE", true);
define("IS_AJAX", true);

include('includes/require/site_head.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], MESSAGING);

$id = (int)$_GET['id'];
$attachment = $db->get_row("SELECT ma.* FROM tblMailAttachments ma INNER JOIN tblMails m ON ma.email_id = m.id WHERE ma.id = '$id' AND (user_to = '{$_SESSION['sess_id']}' OR user_from = '{$_SESSION['sess_id']}') LIMIT 1");

$smarty->assign('width', $attachment['type'] == 'video' ? 330 : 650);
$smarty->assign('attachment', $attachment);
$smarty->display("{$cfg['template']['dir_template']}ajax/attachment_popup.tpl");