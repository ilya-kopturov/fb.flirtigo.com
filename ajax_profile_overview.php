<?php
define("IN_MAINSITE", TRUE);
//define("IS_AJAX", true);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);
$uid = $_SESSION['sess_id'];
$user = $db->get_row("SELECT * FROM `tblUsers` WHERE `id` = '" . $uid . "'");
$viewed = $db->get_var("SELECT COUNT(*) FROM tblViewedProfile v INNER JOIN tblUsers u ON (v.user_id = u.id) WHERE viewed_user_id = '$uid'");
$tags = $db->get_results("SELECT * FROM tblUsers u INNER JOIN tblUserTags ut ON (u.id = ut.user_id) WHERE u.id = '" . $uid . "' ORDER BY ut.id");

$smarty->register_function('age', 'smarty_age');
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('forr', 'smarty_forr');
$smarty->register_function('sexualactivities', 'smarty_sexualactivities');
$smarty->register_function('screenname', 'smarty_screenname');
$smarty->register_function('rateme', 'smarty_rateme');

$smarty->assign("viewed", $viewed);
$smarty->assign("tags", $tags);
$smarty->assign("user", $user);

$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "profile_overview.tpl" );