<?php
/* $Id: attachment.php 528 2008-06-12 15:27:14Z andi $ */

define("IN_MAINSITE", true);

include('includes/require/site_head.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], MESSAGING);

$id = (int)$_GET['id'];
$attachment = $db->get_row("SELECT ma.* FROM tblMailAttachments ma INNER JOIN tblMails m ON ma.email_id = m.id WHERE ma.id = '$id' AND (user_to = '{$_SESSION['sess_id']}' OR user_from = '{$_SESSION['sess_id']}') LIMIT 1");

header("Content-type: {$attachment['mime']}");
header("Content-Disposition: inline; filename=" . urlencode($attachment['name']));

$output = "{$cfg['path']['dir_attachments']}{$attachment['file']}";
if (is_file($output) && is_readable($output)){
	readfile($output);
	die();
}