<?php
/* $Id: ajax_public_videos.php 538 2008-06-13 15:53:10Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");
include('Pager/Pager.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], VIEW_PUBLIC_VIDEOS);

$uid = (int) $_GET['id'];
$videos = $db->get_results("SELECT * FROM tblVideos WHERE `user_id` = '$uid' AND `approved` = 'Y' AND `gallery` = '1'");
$profile = $db->get_row("SELECT * FROM tblUsers WHERE id = '$uid' LIMIT 1");

$pager_options = array(
    'mode'       => 'Jumping',
	'append'	 => false,
	'urlVar'	 => 'v',
	'fileName'	 => "{$cfg[path][url_site]}profile/{$profile['screenname']}?v=%d#Videos",
    'perPage'    => 6,
    'delta'      => 4,
    'itemData' => $videos,
);
$pager = Pager::factory($pager_options);

$smarty->assign('pager', $pager);
$smarty->assign('videos', $pager->getPageData());
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "public_videos.tpl" );