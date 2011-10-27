<?php
/* $Id: ajax_profile_picture.php 540 2008-06-13 16:55:05Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$uid = $_SESSION['sess_id'];
$photo_id = ($_POST['photo_id']) ? $_POST['photo_id'] : -1;
if(!empty($_POST)){
if (strcmp($_GET['u'], 't') == 0) {
	$fileInfo = base64_decode(urldecode($_POST["hidFileID"]));
	list($tmpFile, $origFile, $mime) = explode('<=>', $fileInfo);
	$path_parts = pathinfo($origFile);
	$gallery = (ereg('[01]', $_POST['gallery'])) ? $_POST['gallery'] : 0;
	$extension = strtolower($path_parts['extension']);
	if ($photo_id == -1) {
		$db->query("INSERT INTO `tblPhotos`
			(`user_id`, `gallery`, `photo_name`, `photo_description`, `extension`, `upload_ip`, `upload_date`, `approved`)
			VALUES ('$uid', '$gallery', '" . addslashes($_POST['title']) . "', '" . addslashes($_POST['description']) ."', '$extension', '" . $_SERVER['REMOTE_ADDR'] . "', NOW(), '" . ($_SESSION["sess_typeusr"] == 'Y' ? 'Y' : 'N') . "')"
		);
		$photo_id = $db->lastInsertID();
		/* after picture is approved */
		//$db->query("UPDATE `tblUsers` SET `withpicture` = 'Y' WHERE `id` = '$uid' LIMIT 1");
		$has_main_pic = $db->get_var("SELECT COUNT(*) FROM tblUsers u INNER JOIN tblPhotos p ON u.id = p.user_id WHERE u.id = '$uid' AND p.photo_main = 'Y'");
		if ($has_main_pic == 0) {
			$db->query("UPDATE tblPhotos SET photo_main = 'N' WHERE user_id = '$uid'");
			$db->query("UPDATE tblPhotos SET photo_main = 'Y' WHERE id = '$photo_id'");
		}
	} else {
		if (!$_POST["hidFileID"]) $extension = $db->get_var("SELECT extension FROM tblPhotos WHERE user_id = '$uid' AND id = '$photo_id' LIMIT 1");
		$db->query("UPDATE tblPhotos SET
					gallery = '$gallery',
					extension = '$extension',
					photo_name = '" . addslashes($_POST['title']) . "',
					photo_description = '" . addslashes($_POST['description']) . "'
					WHERE id = '$photo_id' AND user_id = '$uid'"
		);
	}
	if ($_POST["hidFileID"]) {
		$newFile = $cfg['path']['dir_photos'] . $uid . "_" . $photo_id . "." . $extension;
		@unlink($newFile);
		rename($cfg['path']['dir_upload'] . $tmpFile, $newFile);
	}
	
	print <<< EOF
	
$('#profile > ul').tabs('load', 2);
EOF;
	
	exit;
} elseif ((strcmp($_GET['u'], 'd') == 0) && ($photo_id > -1)) {
	$photo = $db->get_row("SELECT * FROM tblPhotos WHERE id = '$photo_id' AND user_id = '$uid'");
	$db->query("DELETE FROM tblPhotos WHERE id = '$photo_id' AND user_id = '$uid'");
	$result = mysql_affected_rows();
	if ($photo['photo_main'] == 'Y') {
		$has_pics = $db->get_row("SELECT p.* FROM tblUsers u INNER JOIN tblPhotos p ON u.id = p.user_id WHERE u.id = '$uid' ORDER BY p.id LIMIT 1");
		if ($has_pics['id']) {
			$db->query("UPDATE tblPhotos SET photo_main = 'Y' WHERE id = '{$has_pics['id']}'");
		}
	}
	print $result;
	exit;
}
header('Location: http://www.flirtigo.com/mem_myprofile.php#Edit_Pictures');
}
$photo = array();
if ($photo_id = $_GET['id']) {
	$photo = $db->get_row("SELECT * FROM tblPhotos WHERE user_id = '$uid' AND id = '$photo_id' LIMIT 1");
}

$smarty->assign('photo', $photo);
$smarty->assign('galleries', array('Private Gallery', 'Public Gallery'));
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "profile_picture.tpl" );
