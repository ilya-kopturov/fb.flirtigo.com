<?php
/* $Id: ajax_private_gallery.php 292 2008-05-17 16:23:58Z andi $ */

define('IN_MAINSITE', true);
define('IS_AJAX', true);

include('includes/require/site_head.php');
include('Pager/Pager.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$uid = (int)$_SESSION['sess_id'];
$filter = strtolower($_GET['filter']);

if ($filter == 'p') {
	$photos = $db->get_results("SELECT * FROM tblPhotos WHERE user_id = '$uid' AND gallery = '0'");
	$photos = $photos ? $photos : array();
	$videos = array();
} elseif ($filter == 'v') {
	$videos = $db->get_results("SELECT * FROM tblVideos WHERE user_id = '$uid' AND gallery = '0'");
	$videos = $videos ? $videos : array();
	$photos = array();
} else {
	$photos = $db->get_results("SELECT * FROM tblPhotos WHERE user_id = '$uid' AND gallery = '0'");
	$photos = $photos ? $photos : array();
	$videos = $db->get_results("SELECT * FROM tblVideos WHERE user_id = '$uid' AND gallery = '0'");
	$videos = $videos ? $videos : array();
}

$gallery = array_merge($photos, $videos);

$pager_options = array(
    'mode'       => 'Jumping',
	'append'	 => false,
	'urlVar'	 => 'g',
	'fileName'	 => "?g=%d&filter={$_GET['filter']}#Private_Gallery",
    'perPage'    => 12,
    'delta'      => 4,
    'itemData'   => $gallery,
);
$pager = Pager::factory($pager_options);

$smarty->register_function('screename', 'smarty_screenname');

$smarty->assign('pager', $pager);
$smarty->assign('media_filter', array(null => 'all', 'p' => 'only photos', 'v' => 'only videos'));
$smarty->assign('gallery', $pager->getPageData());
$smarty->display("{$cfg['template']['dir_template']}ajax/profile_gallery.tpl" );