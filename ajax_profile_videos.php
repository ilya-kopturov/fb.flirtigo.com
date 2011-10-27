<?php
/* $Id: ajax_profile_videos.php 447 2008-06-04 14:57:00Z bogdan $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");
include('Pager/Pager.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$videos = $db->get_results("SELECT * FROM tblVideos WHERE `user_id` = '" . $_SESSION['sess_id'] . "'");

$empty = $cfg['video']['per_page'] - count($videos) % $cfg['video']['per_page'];
for($i = 0; $i < $empty; $i++) {
	$videos[] = array();
}

$pager_options = array(
    'mode'       => 'Jumping',
	'append'	 => false,
	'urlVar'	 => 'v',
	'fileName'	 => 'mem_myprofile.php?v=%d#Edit_Videos',
    'perPage'    => $cfg['video']['per_page'],
    'delta'      => 4,
    'itemData' => $videos,
);
$pager = Pager::factory($pager_options);

$smarty->assign('pager', $pager);
$smarty->assign('videos', $pager->getPageData());
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "profile_videos.tpl" );