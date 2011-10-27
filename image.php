<?php
define("IN_MAINSITE", TRUE);
include ("./includes/" . "require" . "/" . "site_head.php");

$photo_id = $_GET['id'];
$t = $_GET['t'];
$t = $cfg['image']["{$t}_x"] && $cfg['image']["{$t}_y"] ? $t : 'm';

$photo = $db->get_row("SELECT * FROM tblPhotos WHERE id = '$photo_id' LIMIT 1");

$imageFile = (file_exists($cfg['path']['dir_photos'] . $photo['user_id'] . '_' . $photo['id'] . '_b.jpg')) ? $cfg['path']['dir_photos'] . $photo['user_id'] . '_' . $photo['id'] . '_b.jpg' : $cfg['path']['dir_photos'] . $photo['user_id'] . '_' . $photo['id'] . '.' . $photo['extension'];
try {
	$image = new Imagick($imageFile);
	$mime = get_mime_type($imageFile);
	$imageName = id_to_screenname($photo['user_id']) . '.' . $photo['extension'];
} catch (Exception $e) {
	$mime = 'image/jpeg';
	$imageName = 'notfound.jpg';
	$image = new Imagick($cfg['path']['dir_photos'] . 'nophoto.jpg');
}

$image->scaleImage($cfg['image']["{$t}_x"], $cfg['image']["{$t}_y"]);

header('Content-Disposition: inline; filename="' . $imageName . '"');
header("Content-type: $mime");
print $image;
