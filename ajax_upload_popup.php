<?php
/* $Id: ajax_upload_popup.php 526 2008-06-11 18:18:30Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);


include('includes/require/site_head.php');
include('System/Command.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

$uid = $_SESSION['sess_id'];
if (strcmp($_GET['u'], 't') == 0) {
	$fileInfo = base64_decode(urldecode($_POST["hidFileID"]));
	list($tmpFile, $origFile, $mime) = explode('<=>', $fileInfo);
	$attachments = array();
	$attachment['type'] = $_POST["type"];
	$attachment['tmp'] = $tmpFile;
	$attachment['orig'] = $origFile;
	$attachment['mime'] = $mime;

	if (strcasecmp($attachment['type'], 'video') == 0) {
		set_time_limit(0);
		$input = "{$cfg['path']['dir_upload']}$tmpFile";
		$tmpOutput = md5(SECRET . microtime() . SECRET);
		$output = "{$cfg['path']['dir_upload']}$tmpOutput";

		send_mail('chris@w2interactive.com', '', 'vu', $input . " || " . $output . " || " . $tmpOutput, false);
		
		$cmd_mencoder = "{$cfg['path']['cmd_mencoder']} $input -o $output -of lavf -oac mp3lame -lameopts abr=56 -ovc lavc -lavcopts vcodec=flv:vbitrate=800:mbd=2:mv0:trell:v4mv:cbp:last_pred=3 -lavfopts format=flv -vf scale=320:260 -srate 22050";
		$cmd_mplayer  = "{$cfg['path']['cmd_mplayer']} $input -ss 1 -nosound -vo jpeg:outdir={$cfg['path']['dir_upload']}/ -frames 1";
		@exec($cmd_mencoder, $cmd_mencoder_out, $cmd_mencoder_result);
		@exec($cmd_mplayer, $cmd_mplayer_out, $cmd_mplayer_result);
		if ($cmd_mencoder_result != 0 OR $cmd_mplayer_result != 0) {
			$attachment = null;
			@unlink($output);
			@unlink("{$cfg['path']['dir_upload']}00000001.jpg");
		} else {
			@rename("{$cfg['path']['dir_upload']}00000001.jpg", "{$cfg['path']['dir_upload']}{$tmpOutput}_thumb.jpg");
			$attachment['tmp'] = $tmpOutput;
			$attachment['mime'] = 'video/x-flv';
		}
		@unlink($input);
	}

	$error = null;
	if ($attachment) {
		$_SESSION['mail_attachments'][$_GET['e']][] = $attachment;
	} else {
		$error = $cmd_mencoder_result . " | " . $cmd_mplayer_result;
	}

	print <<< EOF
$('#upload_popup').jqmHide().remove();
if ('$error' != '') {
	alert('Failed to encode your video.'+'($error)');
} else {
	setTimeout(function() {
		$('#message_attachments').load('{$cfg['path']['url_site']}ajax_message_attachments.php?e={$_GET['e']}');
	}, 500);
}
EOF;
	exit;
}

$type = (empty($_GET['t']) || !(in_array($_GET['t'], array('picture', 'video')))) ? 'picture' : $_GET['t'];

$smarty->assign('type', $type);
$smarty->display("{$cfg['template']['dir_template']}ajax/upload_popup.tpl");
?>