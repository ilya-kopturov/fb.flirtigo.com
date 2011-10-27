<?php
/* $Id: ajax_compose_pictures.php 340 2008-05-20 17:07:04Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include("includes/require/site_head.php");
include('Pager/Pager.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$photos = $db->get_results("SELECT * FROM tblPhotos WHERE user_id = '" . $_SESSION['sess_id'] . "'");

$pager_options = array(
    'mode'       => 'Jumping',
	'append'	 => false,
	'urlVar'	 => 'p',
	'fileName'	 => 'javascript:compose_gallery_pictures(%d)',
    'perPage'    => 6,
    'delta'      => 4,
    'itemData' => $photos,
);
$pager = Pager::factory($pager_options);

$smarty->assign('photos', $pager->getPageData());
$smarty->assign('pager', $pager);
$smarty->display("{$cfg['template']['dir_template']}ajax/compose_pictures.tpl" );