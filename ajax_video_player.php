<?php
/* $Id: ajax_video_player.php 350 2008-05-23 19:06:51Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

$where = NULL;

$video_id = (int)$_GET['vid'];
$uid = $db->get_var("SELECT `user_id` FROM `tblVideos` WHERE `id` = $video_id");

if($uid != $_SESSION['sess_id']){
	$where = " AND v.`approved` = 'Y' ";
}
$video = $db->get_row("SELECT v.* FROM tblVideos v INNER JOIN tblUsers u ON (v.user_id = u.id) WHERE v.id = '$video_id' $where LIMIT 1");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], ($_SESSION['sess_id'] && ($_SESSION['sess_id'] == $video['user_id'])) ? 0 : PLAY_VIDEOS);

$smarty->assign('video', $video);
$smarty->display("{$cfg['template']['dir_template']}ajax/video_player.tpl");