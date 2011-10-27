<?php
/* $Id: ajax_mail_summary.php 545 2008-06-13 19:13:36Z root $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

$f = (empty($_GET['f']) || !(in_array($_GET['f'], range(1, 5)))) ? 1 : $_GET['f'];

$_SESSION["sess_newmails"] = 0;
$_SESSION["sess_newmails"] = number_format(@$db->get_var("SELECT COUNT(*) FROM `tblMails` WHERE `user_id` = '".$_SESSION['sess_id']."' AND (`folder` = '1' OR `folder` = '5') AND `new` = 'Y'"), 0, '', '');

$folder = ($f == 4) ? 1 : $f;

$new = $old = array('emails' => 0, 'flirts' => 0);
$new['flirts']		= number_format(@$db->get_var("SELECT COUNT(*) FROM `tblMails` WHERE `user_id` = '".$_SESSION['sess_id']."' AND `folder` = '$folder' AND `new` = 'Y' AND `type` = 'F'"), 0, '', '');
$old['flirts']		= number_format(@$db->get_var("SELECT COUNT(*) FROM `tblMails` WHERE `user_id` = '".$_SESSION['sess_id']."' AND `folder` = '$folder' AND `new` = 'N' AND `type` = 'F'"), 0, '', '');
$new['emails']		= number_format(@$db->get_var("SELECT COUNT(*) FROM `tblMails` WHERE `user_id` = '".$_SESSION['sess_id']."' AND `folder` = '$folder' AND `new` = 'Y' AND (`type` = 'E' OR `type` = 'R')"), 0, '', '');
$old['emails']		= number_format(@$db->get_var("SELECT COUNT(*) FROM `tblMails` WHERE `user_id` = '".$_SESSION['sess_id']."' AND `folder` = '$folder' AND `new` = 'N' AND (`type` = 'E' OR `type` = 'R')"), 0, '', '');
$new['announce']	= number_format(@$db->get_var("SELECT COUNT(*) FROM `tblMails` WHERE `user_id` = '".$_SESSION['sess_id']."' AND `folder` = '5' AND `new` = 'Y' AND `type` = 'E'"), 0, '', '');
$old['announce']	= number_format(@$db->get_var("SELECT COUNT(*) FROM `tblMails` WHERE `user_id` = '".$_SESSION['sess_id']."' AND `folder` = '5' AND `new` = 'N' AND `type` = 'E'"), 0, '', '');


if ($f == 4) $new['emails'] = $old['emails'] = 0;

$smarty->assign("folders", $cfg['mail']['folders']);
$smarty->assign("new", $new);
$smarty->assign("old", $old);
$smarty->assign("folder", $f);

$smarty->display("{$cfg['template']['dir_template']}ajax/mail_summary.tpl");
