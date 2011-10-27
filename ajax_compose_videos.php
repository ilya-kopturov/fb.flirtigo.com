<?php
/* $Id: ajax_compose_videos.php 340 2008-05-20 17:07:04Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");
include('Pager/Pager.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$videos = $db->get_results("SELECT * FROM tblVideos WHERE user_id = '{$_SESSION['sess_id']}'");

$pager_options = array(
    'mode'       => 'Jumping',
	'append'	 => false,
	'urlVar'	 => 'v',
	'fileName'	 => "javascript:compose_gallery_videos(%d)",
    'perPage'    => 6,
    'delta'      => 4,
    'itemData' => $videos,
);
$pager = Pager::factory($pager_options);

$smarty->assign('pager', $pager);
$smarty->assign('videos', $pager->getPageData());
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "compose_videos.tpl" );