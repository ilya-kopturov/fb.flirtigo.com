<?php
/* $Id: attachment_preview.php 528 2008-06-12 15:27:14Z andi $ */

define("IN_MAINSITE", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], MESSAGING);

$id = (int)$_GET['id'];
$attachment = $db->get_row("SELECT ma.* FROM tblMailAttachments ma INNER JOIN tblMails m ON ma.email_id = m.id WHERE ma.id = '$id' AND (user_to = '{$_SESSION['sess_id']}' OR user_from = '{$_SESSION['sess_id']}') LIMIT 1");

$mime = $attachment['mime'];
try {
	if ($attachment['type'] == 'video') {
		$mime = 'image/jpeg';
		$filename = substr($attachment['file'], 0, strpos($attachment['file'], '.'));
		$image = new Imagick("{$cfg['path']['dir_attachments']}{$filename}_thumb.jpg");
	} else {
		$image = new Imagick("{$cfg['path']['dir_attachments']}{$attachment['file']}");
	}
} catch (Exception $e) {
	$mime = 'image/jpeg';
	$image = new Imagick($cfg['path']['dir_photos'] . ($attachment['type'] == 'video' ? 'novideo.jpg' : 'nophoto.jpg'));
}

$image->scaleImage($cfg['image']["s_x"], $cfg['image']["s_y"]);

header("Content-type: {$mime}");
header("Content-Disposition: inline; filename=" . urlencode($attachment['name']));

print $image;
