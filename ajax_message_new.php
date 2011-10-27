<?php
/* $Id: ajax_message_new.php 528 2008-06-12 15:27:14Z andi $ */

define('IN_MAINSITE', true);
define('IS_AJAX', true);

include('includes/require/site_head.php');

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], MESSAGING);

if (strcmp($_GET['u'], 't') == 0) {
	$subject  = htmlentities(strip_tags(trim($_POST['subject'])))?htmlentities(strip_tags(trim($_POST['subject']))):'(no subject)';
	$to       = htmlentities(strip_tags(trim($_POST['to'])));
	$message  = htmlentities(strip_tags(trim($_POST['body'])));
	$error = sent_message($db, $to, $subject, $message, 1);

	$msg = $error ? "Error: $error" : "Message sent!";
	print <<< EOF
$('#compose_popup').jqmHide().remove();
alert('$msg');
EOF;
	exit;
}

$smarty->register_function('screenname', 'smarty_screenname');
$smarty->assign('email', array('id' => rand(), 'user_from' => $_GET['id']));
$smarty->display("{$cfg['template']['dir_template']}ajax/new_mail_popup.tpl");
