<?php
define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include("includes/require/site_head.php");

$id = (int) $_GET['id'];
$photo = $db->get_row("SELECT * FROM tblPhotos WHERE id = '$id' LIMIT 1");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], ($_SESSION['sess_id'] && ($_SESSION['sess_id'] == $photo['user_id'])) ? 0 : VIEW_PUBLIC_PHOTOS);

$smarty->assign('photo', $photo);
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "public_picture.tpl" );