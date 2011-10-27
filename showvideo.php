<?php
define("IN_MAINSITE", TRUE);

header('Content-Type:image/jpeg');

include ("./includes/" . "require" . "/" . "site_head.php");

$p = $_GET['p']>0?$_GET['p']-1:0;

if($_GET['id'] != $_SESSION['sess_id']) $_GET['a'] = 'Y';

if($_GET['a'] == 'Y'){ $where  = " AND `approved`    = 'Y' "; }
if($_GET['m'] == 'Y'){ $where .= " AND `video_main`  = 'Y' "; }
if($_GET['m'] == 'N'){ $where .= " AND `video_main` != 'Y' "; }

$video = $db->get_row("SELECT `id`,`video_ext` FROM `tblVideos` WHERE `user_id` = '". (int) $_GET['id']."'" . $where . "ORDER BY `id` ASC LIMIT 1 OFFSET " . $p);


//include ("./includes/" . "require" . "/" . "site_foot.php");

if($_GET['t'] == 'r'){
	$source = $cfg['path']['dir_videos'] . "thumb" . "/" . (int) $_GET['id'] . "_" . (int) $video['id'] . "_r.jpg";
} else {
	$source = $cfg['path']['dir_videos'] . "thumb" . "/" . (int) $_GET['id'] . "_" . (int) $video['id'] . ".jpg";
}

if(!@readfile($source)){
	if($_GET['t'] == 'r'){
		@readfile($cfg['path']['dir_videos'] ."thumb"."/"."novideo_r.jpg");
	}else{
		@readfile($cfg['path']['dir_videos'] ."thumb" ."/"."novideo.jpg");
	}
}
?>
