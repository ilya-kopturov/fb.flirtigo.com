<?php
/* $Id: check_private_gallery_password.php 294 2008-05-19 17:23:05Z andi $ */

define('IN_MAINSITE', true);
define('IS_AJAX', true);

include('includes/require/site_head.php');

$uid = $_GET['id'];
$pass = $_GET['gallery_password'];
$result = 'false';

$profile = $db->get_row("SELECT * FROM tblUsers WHERE id = '$uid' LIMIT 1");

if (isset($pass) && (strcasecmp($profile['gallery_pass'], $pass) == 0)) {
	$_SESSION['gallery_auth'][$uid] = true;
	$result = 'true';
}

print $result;
?>