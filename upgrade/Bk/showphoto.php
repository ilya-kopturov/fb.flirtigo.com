<?php
/* $Id: showphoto.php 536 2008-06-13 13:21:46Z andi $ */

define("IN_MAINSITE", TRUE);
include ("includes/require/site_head.php");

$order = "`id` ASC";

$p = $_GET['p']>0?$_GET['p']-1:0;

if($_GET['id'] != $_SESSION['sess_id']) $_GET['a'] = 'Y';

if($_GET['a'] == 'Y'){ $where  = " AND `approved`    = 'Y' "; }
if($_GET['m'] == 'Y'){ $where .= " AND `photo_main`  = 'Y' "; }
if($_GET['m'] == 'N'){ $where .= " AND `photo_main` != 'Y' "; }
if($_GET['f'] == 'Y'){ $order  = "`photo_featured` DESC"; }

$t = $_GET['t'];
$t = $cfg['image']["{$t}_x"] && $cfg['image']["{$t}_y"] ? $t : 'm';

$photo_id = (int) $_GET['photo_id'];
$uid = $_GET['id'] ? $_GET['id'] : $_SESSION['sess_id'];

$private = false;
if ($uid && !$photo_id) {
	$photo = $db->get_row("SELECT p.* 
	                       FROM   tblPhotos p  
	                       WHERE  p.user_id = '$uid' AND p.photo_main = 'Y' AND p.approved = 'Y'");
	$private = ($photo['gallery'] == '0');
} else {
	$photo = $db->get_row("SELECT * FROM `tblPhotos` WHERE `id` = '$photo_id' LIMIT 1");
}

if ($private) {
	$imageFile = $cfg['path']['dir_photos'] . 'nophoto_p.jpg';
	$resize = true;
} else {
	$photo_id = $photo['id'];
	if (file_exists($cfg['path']['dir_photos'] . $photo['user_id'] . '_' . $photo['id'] . "_{$t}.jpg")) {
		$imageFile = $cfg['path']['dir_photos'] . $photo['user_id'] . '_' . $photo['id'] . "_{$t}.jpg";
		$resize = false;
	} elseif (file_exists($cfg['path']['dir_photos'] . $photo['user_id'] . '_' . $photo['id'] . "_b.jpg")) {
		$imageFile = $cfg['path']['dir_photos'] . $photo['user_id'] . '_' . $photo['id'] . "_b.jpg";
		$resize = true;
	} else {
		$imageFile = $cfg['path']['dir_photos'] . $photo['user_id'] . '_' . $photo['id'] . '.' . $photo['extension'];
		$resize = true;
	}
}

if($_GET['t'] == 'b' AND $_GET['id'] != $_SESSION['sess_id']){
	$update   = $db->query("UPDATE `tblPhotos` SET `photo_viewed` = `photo_viewed` + 1 WHERE `id` = '". (int) $photo_id ."' LIMIT 1");
}

//TODO image watermark

//echo $imageFile;

try {
	$image = new Imagick($imageFile);
	$mime = get_mime_type($imageFile);
	$imageName = id_to_screenname($photo['user_id']) . '.' . $photo['extension'];
} catch (Exception $e) {
	$mime = 'image/jpeg';
	$imageName = 'notfound.jpg';
	$image = new Imagick($cfg['path']['dir_photos'] . 'nophoto.jpg');
}

if ($resize) $image->scaleImage($cfg['image']["{$t}_x"], $cfg['image']["{$t}_y"]);


header('Content-Disposition: inline; filename="' . $imageName . '"');
header("Content-type: $mime");
print $image;

?>