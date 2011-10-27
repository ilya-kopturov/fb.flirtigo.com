<?php
/* $Id: ajax_public_profile.php 424 2008-06-02 15:22:17Z bogdan $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

$uid = (int) $_GET['id'];

$user = $db->get_row("SELECT u.*, p.id as photo_id FROM tblUsers u LEFT JOIN (SELECT * FROM tblPhotos WHERE user_id = '$uid' AND photo_main = 'Y') as p ON (u.id = p.user_id) WHERE u.id = '$uid' LIMIT 1");

$tags = $db->get_results("SELECT * FROM tblTagCount ORDER BY RAND() LIMIT 10");
$tag_sum = $db->get_var("SELECT tag_sum FROM tblCounter LIMIT 1");

$smarty->register_function('age', 'smarty_age');
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('location', 'smarty_location');
$smarty->register_function('forr', 'smarty_forr');
$smarty->register_function('sexualactivities', 'smarty_sexualactivities');
$smarty->register_function('screenname', 'smarty_screenname');
$smarty->register_function('online', 'smarty_online');
$smarty->register_function('rateme', 'smarty_rateme');

$smarty->left_delimiter = '/-';
$smarty->right_delimiter = '-/';

$smarty->assign('tags', $tags);
$smarty->assign('tag_sum', $tag_sum);

$smarty->assign("user", $user);

$smarty->display("{$cfg['template']['dir_template']}ajax/public_profile.tpl" );