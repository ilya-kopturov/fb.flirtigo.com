<?php
/* $Id: ajax_profile_pictures.php 350 2008-05-23 19:06:51Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include("includes/require/site_head.php");
include('Pager/Pager.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$photos = $db->get_results("SELECT * FROM tblPhotos WHERE user_id = '" . $_SESSION['sess_id'] . "'");

$empty = $cfg['image']['per_page'] - count($photos) % $cfg['image']['per_page'];
for($i = 0; $i < $empty; $i++) {
	$photos[] = array();
}

$pager_options = array(
    'mode'       => 'Jumping',
	'append'	 => false,
	'urlVar'	 => 'p',
	'fileName'	 => 'mem_myprofile.php?p=%d#Edit_Pictures',
    'perPage'    => $cfg['image']['per_page'],
    'delta'      => 4,
    'itemData' => $photos,
);
$pager = Pager::factory($pager_options);

$smarty->assign('photos', $pager->getPageData());
$smarty->assign('pager', $pager);
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "profile_pictures.tpl" );