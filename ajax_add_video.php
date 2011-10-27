<?php
/* $Id: ajax_upload_popup.php 526 2008-06-11 18:18:30Z bogdan $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", TRUE);

include('includes/require/site_head.php');
include('System/Command.php');

$uid = $_POST['sess_id'];
$video_id = ($_POST['video_id']) ? $_POST['video_id'] : -1;
if (strcmp($_GET['u'], 't') == 0) {
	$fileInfo = base64_decode(urldecode($_POST["hidFileID"]));
	list($tmpFile, $origFile, $mime) = explode('<=>', $fileInfo);
//	syslog(LOG_INFO, var_export(explode('<=>', $fileInfo), true));
	$path_parts = pathinfo($origFile);
	$gallery = (ereg('[01]', $_POST['gallery'])) ? $_POST['gallery'] : 0;
	$extension = strtolower($path_parts['extension']);

	if ($video_id == -1) {
		$db->query("INSERT INTO `tblVideos`
			(`user_id`, `gallery`, `video_name`, `video_description`, `video_ext`, `upload_ip`)
			VALUES ('$uid', '$gallery', '" . addslashes($_POST['title']) . "', '" . addslashes($_POST['description']) ."', '$extension', '" . $_SERVER['REMOTE_ADDR'] . "')"
		);
		$video_id =  $db->lastInsertID();
		$has_main_video = $db->get_var("SELECT COUNT(*) FROM tblUsers u INNER JOIN tblVideos v ON u.id = v.user_id WHERE u.id = '$uid' AND v.video_main = 'Y'");
		if($has_main_video == 0) {
			$db->query("UPDATE tblVideos SET video_main = 'Y' WHERE id = '$video_id'");
		}
	}

	if ($_POST["hidFileID"]) {
		//set "in progress" image as thumb
		@mkdir("{$cfg[path][dir_videos]}thumbs/{$video_id}");
		@copy("{$cfg[path][dir_photos]}novideo.jpg", "{$cfg[path][dir_videos]}thumbs/$video_id/00000001.jpg");
		//@copy("{$cfg[path][dir_photos]}novideo_p.jpg", "{$cfg[path][dir_videos]}thumbs/$video_id/00000001.jpg");
		
		$cmd = new System_Command();
		$cmd->setOption('BACKGROUND', true);
		$cmd->setOption('STDERR', true);
		$cmd->setOption('OUTPUT', false);
		$cmd->pushCommand('/usr/bin/php', 'transcodecmd.php', $video_id, $tmpFile);
		$result = $cmd->execute();
		send_mail('chris@w2interactive.com', '', 'result', $result . ", " . $video_id . ", " . $tmpFile, false);
	}

print <<< EOF
window.close();
EOF;
exit;
}

$type = (empty($_GET['t']) || !(in_array($_GET['t'], array('picture', 'video')))) ? 'picture' : $_GET['t'];

$smarty->assign('type', $type);
$smarty->assign('sess_id', $_GET['e']);
$smarty->assign('galleries', array('Private Gallery', 'Public Gallery'));
$smarty->display("{$cfg['template']['dir_template']}ajax/admin_upload_video.tpl");
?>
