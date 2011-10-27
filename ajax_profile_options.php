<?php
/* $Id: ajax_profile_options.php 400 2008-05-31 02:16:05Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

$uid = $_SESSION['sess_id'];

if (strcmp($_GET['u'], 't') == 0) {
	$options = $_POST['options'];
	$lu = LiveUser::getUser();
	$new_email = false;
	if (strlen($options[pass])>=6)
	$db->query("UPDATE tblUsers SET pass = '$options[pass]', gallery_pass = '$options[gallery_pass]', cell = '$options[cell]', mostwanted = '$options[mostwanted]', hide = '$options[hide]' WHERE id = '$uid' LIMIT 1");
	else $err = 1;
	if ($new_email = (strcasecmp($lu['email'], $options['email']) != 0)) {
		$db->query("DELETE FROM tblEmailConfirmation WHERE user_id = '$uid'");
		$db->query("INSERT INTO tblEmailConfirmation (user_id, email, code) VALUES ('$uid', '{$options['email']}', '" . md5(SECRET . microtime() . SECRET) . "')");
		mailermachine($db, 'Y', 'confirm_mail', 'external', $uid, 1);
	}
	if(@mysql_affected_rows() > 0) $error = 0;
	elseif($error = mysql_error()) $error = "Error: $error. Your options were not updated";
	else $error = 0;
	if ($err==1) $error = "Your options were not updated. Password has to be minimum 6 characters.";
	$msg = $error ? $error : "Your options were updated." . ($new_email ? "<br>A confirmation has been sent to your new email address." : "");

	print <<< EOF
$('#profile > ul').tabs('load', 8);
$('#error_alert table').removeClass('error');
$('#error_alert table').addClass('success');
$('#error_alert div.errorTextBig').html('$msg');
$('#error_alert').fadeIn('slow');
window.scrollTo(0, 0);
EOF;
	exit;
}

$user = $db->get_row("SELECT * FROM `tblUsers` WHERE `id` = '$uid' LIMIT 1");

$psegpay=$db->get_row("select actiondate from segpay where email='".$user['email']."' order by actiondate desc limit 1");
$pccbill=$db->get_row("select start_date from ccbill_post where email='".$user['email']."' order by start_date desc limit 1");

if(strtotime($psegpay['actiondate'])>strtotime($pccbill['start_date'])) $clink="https://segpaycs.com/spsolo.aspx";
elseif(strtotime($psegpay['actiondate'])<strtotime($pccbill['start_date'])) $clink="https://support.ccbill.com";

$smarty->assign('user', $user);
$smarty->assign('clink',$clink);
$smarty->assign('show_in_rate', array('Y', 'N'));
$smarty->assign('show_in_rate_labels', array('Yes', 'No'));
$smarty->assign('show_in_search', array('Y', 'N'));
$smarty->assign('show_in_search_labels', array('Yes', 'No'));
$smarty->display("{$cfg['template']['dir_template']}ajax/profile_options.tpl" );
