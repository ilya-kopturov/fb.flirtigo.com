<?php
/* $Id: public_profile.php 417 2008-06-01 16:13:58Z andi $ */

define("IN_MAINSITE", TRUE);
include ("includes/require/site_head.php");

$stats     = stats($db);
getcams();

$profile_id = (int) $_GET['id'];
$profile = $db->get_row("SELECT * FROM tblUsers WHERE id = '$profile_id' LIMIT 1");

$smarty->assign('profile', $profile);
$smarty->assign("cams_date", date("H:i A", mktime(date("H")+1,date("i"),date("s"),date("m"),date("d"),date("Y"))));

$site_section = $_SESSION['sess_id'] ? 'login' : 'public';
$smarty->display($cfg['template']['dir_template'] . "{$site_section}/header.tpl");
$smarty->display( $cfg['template']['dir_template'] . "common/" . "public_profile.tpl" );
$smarty->display($cfg['template']['dir_template'] . "{$site_section}/footer.tpl");

include ("includes/require/site_foot.php");
