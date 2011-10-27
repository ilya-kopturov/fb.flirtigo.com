<?php
/* $Id: ajax_profile_tags.php 540 2008-06-13 16:55:05Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);
$uid = $_SESSION['sess_id'];

if (strcmp($_GET['u'], 't') == 0) {
	$tags = $_POST['tags'];
	foreach($tags as $id => $value) {
		$matches = array();
		eregi('^id_([0-9]+)$', $id, $matches);
		$value = trim($value);
		$id = $matches[1] ? $matches[1] : null;
		if ((strcmp($value, '') == 0) && !is_null($id)) {
			$db->query("DELETE FROM tblUserTags WHERE id = '$id' AND user_id = '$uid'");
		} elseif ((strcmp($value, '') != 0) && !is_null($id)) {
			$db->query("UPDATE tblUserTags SET value = '$value' WHERE id = '$id' AND user_id = '$uid'");
		} elseif (strcmp($value, '') != 0) {
			$db->query("INSERT INTO tblUserTags (user_id, value) VALUES ('$uid', '$value')");
		}
	}
	print<<< EOF
$('#error_alert table').removeClass('error');
$('#error_alert table').addClass('success');
$('#error_alert div.errorTextBig').html('Tags updated successfully');
$('#error_alert').fadeIn('slow');
$('#profile > ul').tabs('load', 5);
window.scrollTo(0, 0);
EOF;
	exit;
}

$popular = $db->get_results("SELECT * FROM tblTagCount ORDER BY count DESC LIMIT 5");
$tags = $db->get_results("SELECT * FROM tblUsers u INNER JOIN tblUserTags ut ON (u.id = ut.user_id) WHERE u.id = '" . $uid . "' ORDER BY ut.id");
if (count($tags) == 0) {
	$user = $db->get_row("SELECT * FROM tblUsers WHERE id = '$uid' LIMIT 1");
	$for = forr_array($user['for']);
	$for = $for ? $for : array();
	$for_keys = array_keys($for);
	$fetishes = sexualactivities_array($user['sexualactivities']);
	$fetishes = $fetishes ? $fetishes : array();
	$fetishes_keys = array_keys($fetishes);
	$count = max(count($for_keys), count(array_keys($fetishes_keys)));
	$tags = array(array('id' => md5(microtime()), 'value' => $user['city']));
	for($i = 0; $i < $count; $i++) {
		if ($cfg['profile']['for'][$for_keys[$i]]) $tags[] = array('id' => md5(microtime()), 'value' => $cfg['profile']['for'][$for_keys[$i]]);
		if ($cfg['profile']['sexualactivities'][$fetishes_keys[$i]]) $tags[] = array('id' => md5(microtime()), 'value' => $cfg['profile']['sexualactivities'][$fetishes_keys[$i]]);
	}
}

$smarty->assign("add_one", count($tags) - (int)(count($tags) / 2) * 2);
$smarty->assign("tags", $tags);
$smarty->assign("popular", $popular);
$smarty->display( $cfg['template']['dir_template'] . "ajax/profile_tags.tpl" );