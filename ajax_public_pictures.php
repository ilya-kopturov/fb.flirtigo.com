<?php
/* $Id: ajax_public_pictures.php 538 2008-06-13 15:53:10Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include("includes/require/site_head.php");
include('Pager/Pager.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], VIEW_PUBLIC_PHOTOS);

$uid = (int) $_GET['id'];
$photos = $db->get_results("SELECT * FROM tblPhotos WHERE `user_id` = '$uid' AND `approved` = 'Y' AND `gallery` = '1'");
$profile = $db->get_row("SELECT * FROM tblUsers WHERE id = '$uid' LIMIT 1");

$pager_options = array(
    'mode'       => 'Jumping',
	'append'	 => false,
	'urlVar'	 => 'p',
	'fileName'	 => "{$cfg[path][url_site]}profile/{$profile['screenname']}?p=%d#Pictures",
    'perPage'    => 6,
    'delta'      => 4,
    'itemData' => $photos,
);
$pager = Pager::factory($pager_options);

$smarty->assign('photos', $pager->getPageData());
$smarty->assign('pager', $pager);
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "public_pictures.tpl" );