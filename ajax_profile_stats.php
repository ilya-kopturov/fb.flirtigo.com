<?php
/* $Id: ajax_profile_stats.php 538 2008-06-13 15:53:10Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");
include('Pager/Pager.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

$uid = $_SESSION['sess_id'];
$users = $db->get_results("SELECT DISTINCT v.user_id, u.* FROM tblViewedProfile v INNER JOIN tblUsers u ON (v.user_id = u.id) WHERE viewed_user_id = '$uid' ORDER BY v.date DESC");

$pager_options = array(
    'mode'       => 'Jumping',
	'append'	 => false,
	'urlVar'	 => 's',
	'fileName'	 => "mem_myprofile.php?t=$type&s=%d#Who_Viewed_Me",
    'perPage'    => 6,
    'delta'      => 4,
    'itemData' => $users,
);
$pager = Pager::factory($pager_options);

$smarty->register_function('age', 'smarty_age');
$smarty->register_function('online', 'smarty_online');
$smarty->register_function('rateme', 'smarty_rateme');
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('location', 'smarty_location');
$smarty->register_function('lastlogin', 'smarty_lastlogin');

$smarty->assign('pager', $pager);
$smarty->assign("users", $pager->getPageData());
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "profile_stats.tpl" );