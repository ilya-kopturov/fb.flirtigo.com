<?php
/* $Id: ajax_profile_hot-block.php 350 2008-05-23 19:06:51Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");
include('Pager/Pager.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$uid = $_SESSION['sess_id'];
$type = in_array($_GET['t'], array('H', 'B')) ? $_GET['t'] : 'H';
$users = $db->get_results("SELECT * FROM tblHotBlockList hb INNER JOIN tblUsers u ON (hb.friend_user_id = u.id) WHERE hb.user_id = '$uid' AND type = '$type'");

$pager_options = array(
    'mode'       => 'Jumping',
	'append'	 => false,
	'urlVar'	 => 'l',
	'fileName'	 => "mem_myprofile.php?t=$type&l=%d#Edit_Hot__Block_Lists",
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
$smarty->assign("types", array('H' => 'Hot', 'B' => 'Block'));
$smarty->assign("users", $pager->getPageData());
$smarty->display("{$cfg['template']['dir_template']}ajax/profile_hot-block.tpl");