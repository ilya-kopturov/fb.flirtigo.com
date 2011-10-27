<?php
/* $Id: swfupload.php 687 2008-06-30 13:27:29Z bogdan $ */

define('IN_MAINSITE', true);
include('includes/require/site_head.php');

$result = ' ';

// syslog(LOG_INFO, var_export($_FILES, true));
if (isset($_FILES["uploaded_file"]) && is_uploaded_file($_FILES["uploaded_file"]["tmp_name"]) && $_FILES["uploaded_file"]["error"] == 0) {
	$tmp = md5(microtime());
	$mime = get_mime_type($_FILES['uploaded_file']['tmp_name']);
	if(!is_dir($cfg['path']['dir_upload'])){mkdir($cfg['path']['dir_upload'],0777);}
	$result = move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $cfg['path']['dir_upload'] . $tmp) ? urlencode(base64_encode($tmp . '<=>' . $_FILES['uploaded_file']['name'] . '<=>' . $mime)) : ' ';
	$f = print_r($_FILES, true);
} else {
	$result = ' ';
}
print $result;
