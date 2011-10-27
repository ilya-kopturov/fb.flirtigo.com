<?php
/* $Id: ajax_message_attachments.php 526 2008-06-11 18:18:30Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

if (strcmp($_GET['u'], 'd') == 0) {
	$id = $_GET['id'];
	@unlink("{$cfg['path']['dir_upload']}{$_SESSION['mail_attachments'][$_GET['e']][$id]['tmp']}");
	@unlink("{$cfg['path']['dir_upload']}{$_SESSION['mail_attachments'][$_GET['e']][$id]['tmp']}_thumb.jpg");
	unset($_SESSION['mail_attachments'][$_GET['e']][$id]);
}

$smarty->display("{$cfg['template']['dir_template']}ajax/mail_attachments.tpl");