<?php
/* $Id: ajax_hot-block.php 340 2008-05-20 17:07:04Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$uid = $_SESSION['sess_id'];
$friend_id = $_GET['id'];
$type = in_array($_GET['t'], array('H', 'B')) ? $_GET['t'] : 'H';

if (isset($_GET['d'])) {
	$db->query("DELETE FROM tblHotBlockList WHERE user_id = '$uid' AND friend_user_id = '$friend_id'");
}
else {
	try {
		$found = $db->get_var("SELECT id FROM tblUsers WHERE id = '$friend_id' LIMIT 1");
		if (!$found) throw new Exception('Profile not found.');
		$found = $db->get_var("SELECT type FROM tblHotBlockList WHERE user_id = '$uid' AND friend_user_id = '$friend_id'");
		if ($found) throw new Exception('Profile already found in your ' . ($found == 'H' ? 'Hot' : 'Block') . ' List.');
		$db->query("INSERT INTO tblHotBlockList (user_id, friend_user_id, type) VALUES ('$uid', '$friend_id', '$type')");
		$result = 'Profile added to your ' . ($type == 'H' ? 'Hot' : 'Block') . ' List.';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}
	print "alert('$result')";
}
?>