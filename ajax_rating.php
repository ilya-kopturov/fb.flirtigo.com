<?php
define("IN_MAINSITE", true);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

$rating = null;
if(isset($_GET['id']) and isset($_GET['f']) and $_GET['f'] > 0 and $_GET['id'] != $_SESSION['sess_id']) {
	$f = (float)$_GET['f'] / 3;
	$voted = $db->get_var("SELECT COUNT(*) FROM `tblRate` WHERE `user_id` = '". (int) $_GET['id']."' AND `ip` = '".$_SERVER['REMOTE_ADDR']."' and `date` = '".date("Y-m-d")."'");
	$voted = defined('DEBUG') || ($voted == 0);
	if ($voted) {
		$db->query("INSERT INTO `tblRate` (`user_id`, `rate`,`ip`,`date`) VALUES ('" . (int) $_GET['id'] . "', '$f','" . $_SERVER['REMOTE_ADDR'] . "',NOW())");
		$rating = $db->get_var("SELECT AVG(`rate`) FROM `tblRate` WHERE `user_id` = '" . (int) $_GET['id'] . "'");
		$db->query("UPDATE `tblUsers` SET `votes` = `votes` + 1, `rating` = '$rating' WHERE `id` = '". (int) $_GET['id']."' LIMIT 1");
	}
}
print $rating;
