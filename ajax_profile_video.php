<?php
/* $Id: ajax_profile_video.php 540 2008-06-13 16:55:05Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include('includes/require/site_head.php');
include('System/Command.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$uid = $_SESSION['sess_id'];
$video_id = ($_POST['video_id']) ? $_POST['video_id'] : -1;
if (strcmp($_GET['u'], 't') == 0) {
	$fileInfo = base64_decode(urldecode($_POST["hidFileID"]));
	list($tmpFile, $origFile, $mime) = explode('<=>', $fileInfo);
	//syslog(LOG_INFO, var_export(explode('<=>', $fileInfo), true));
	$path_parts = pathinfo($origFile);
	$gallery = (ereg('[01]', $_POST['gallery'])) ? $_POST['gallery'] : 0;
	$extension = strtolower($path_parts['extension']);
	if ($video_id == -1) {
		$db->query("INSERT INTO `tblVideos`
			(`user_id`, `gallery`, `video_name`, `video_description`, `video_ext`, `upload_ip`, `approved`)
			VALUES ('$uid', '$gallery', '" . addslashes($_POST['title']) . "', '" . addslashes($_POST['description']) ."', '$extension', '" . $_SERVER['REMOTE_ADDR'] . "', '" . ($_SESSION["sess_typeusr"] == 'Y' ? 'Y' : 'N') . "')"
		);
		$video_id =  $db->lastInsertID();
		/* after video is approved */
		//$db->query("UPDATE `tblUsers` SET `withvideo` = 'Y' WHERE `id` = '$uid' LIMIT 1");
		$has_main_video = $db->get_var("SELECT COUNT(*) FROM tblUsers u INNER JOIN tblVideos v ON u.id = v.user_id WHERE u.id = '$uid' AND v.video_main = 'Y' AND v.gallery = '1'");
		if($has_main_video == 0) {
			$db->query("UPDATE tblVideos SET video_main = 'N' WHERE user_id = '$uid'");
			$db->query("UPDATE tblVideos SET video_main = 'Y' WHERE id = '$video_id'");
		}
	} else {
		if (!$_POST["hidFileID"]) $extension = $db->get_var("SELECT extension FROM tblVideos WHERE user_id = '$uid' AND id = '$video_id' LIMIT 1");
		$db->query("UPDATE tblVideos SET
					gallery = '$gallery',
					video_ext = '$extension',
					video_name = '" . addslashes($_POST['title']) . "',
					video_description = '" . addslashes($_POST['description']) . "'
					WHERE id = '$video_id' AND user_id = '$uid'"
		);
	}

	if ($_POST["hidFileID"]) {
		//set "in progress" image as thumb
		@mkdir("{$cfg[path][dir_videos]}thumb/{$video_id}");
		@copy("{$cfg[path][dir_photos]}novideo_p.jpg", "{$cfg[path][dir_videos]}thumb/$video_id/00000001.jpg");

		$cmd = new System_Command();
		$cmd->setOption('BACKGROUND', true);
		$cmd->setOption('STDERR', true);
		$cmd->setOption('OUTPUT', false);
		$cmd->pushCommand('/usr/bin/php', 'transcodecmd.php', $video_id, $tmpFile);
		$cmd->execute();
	}

	print <<< EOF
$('#profile > ul').tabs('load', 3);
EOF;
	exit;
} elseif ((strcmp($_GET['u'], 'd') == 0) && ($video_id > -1)) {
	$video = $db->get_row("SELECT * FROM tblVideos WHERE id = '$video_id' AND user_id = '$uid'");
	$db->query("DELETE FROM tblVideos WHERE id = '$video_id' AND user_id = '$uid'");
	$result = mysql_affected_rows();
	if ($video['video_main'] == 'Y') {
		$has_videos = $db->get_row("SELECT v.* FROM tblUsers u INNER JOIN tblVideos v ON u.id = v.user_id WHERE u.id = '$uid' ORDER BY v.id LIMIT 1");
		if ($has_videos['id']) {
			$db->query("UPDATE tblVideos SET video_main = 'Y' WHERE id = '{$has_videos['id']}'");
		}
	}
	print $result;
	exit;
}

$video = array();
if ($video_id = $_GET['id']) {
	$video = @$db->get_row("SELECT * FROM tblVideos WHERE user_id = '$uid' AND id = '$video_id' LIMIT 1");
}

$smarty->assign('video', $video);
$smarty->assign('galleries', array('Private Gallery', 'Public Gallery'));
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "profile_video.tpl" );
