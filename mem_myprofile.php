<?php
/* $Id: mem_myprofile.php 417 2008-06-01 16:13:58Z andi $ */

define("IN_MAINSITE", TRUE);

include ($cfg['path']['dir_include'] . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);
$featured      = mem_featuredPopular("small");
$stats         = stats($db);

$smarty->assign("stats", $stats);
$smarty->assign("featured", $featured);

/*
$user      = $db->get_row("SELECT * FROM `tblUsers`
                                    WHERE `id` = '" . $_SESSION['sess_id'] . "'");



$visitme   = $db->get_results("SELECT `viewed_user_id` FROM `tblViewedProfile`
                                                       WHERE `user_id` = '" . $_SESSION['sess_id']. "'
                                                       ORDER BY `date` DESC
                                                       LIMIT 5");

$photos_description = @$db->get_results("SELECT `photo_description` FROM `tblPhotos` WHERE `user_id` = '".$_SESSION['sess_id']."' ORDER BY `id` ASC");
$videos_description = @$db->get_results("SELECT `video_description` FROM `tblVideos` WHERE `user_id` = '".$_SESSION['sess_id']."' ORDER BY `id` ASC");

$smarty->assign("user",      $user);
$smarty->assign("visitme",   $visitme);

$smarty->assign("photos_description", $photos_description);
$smarty->assign("videos_description", $videos_description);

$smarty->assign("countries", $cfg['countries']);
$smarty->assign("states",    $cfg['states']);

$smarty->register_function('age', 'smarty_age');
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('forr', 'smarty_forr');
$smarty->register_function('sexualactivities', 'smarty_sexualactivities');
$smarty->register_function('screenname', 'smarty_screenname');

*/

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "myprofile.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

/*
$smarty->unregister_function('age');
$smarty->unregister_function('looking');
$smarty->unregister_function('forr');
$smarty->unregister_function('sexualactivities');
$smarty->unregister_function('screenname');
*/

include ($cfg['path']['dir_include'] . "require" . "/" . "site_foot.php");
?>