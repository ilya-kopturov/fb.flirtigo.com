<?php
/* $Id: ajax_message_reply.php 533 2008-06-13 11:00:01Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");
include('captcha/rand.php');


check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], MESSAGING);

$_SESSION['captcha_id'] = $str;

if (strcmp($_GET['u'], 't') == 0) {
        $subject  = htmlentities(strip_tags(trim($_POST['subject'])))?htmlentities(strip_tags(trim($_POST['subject']))):'(no subject)';
        $to       = htmlentities(strip_tags(trim($_POST['to'])));
        $message  = htmlentities(strip_tags(trim($_POST['body'])));

        $error = sent_message($db, $to, $subject, $message, 1, $_POST['message_id']);
        $selectTab = (int)$_GET['f'] - 1;
        $selectTab = (($selectTab >= 0) && ($selectTab <= 3)) ? $selectTab : 0;
        $msg = $error ? "Error: $error" : "Message sent!";
        print <<< EOF
$('#error_alert table').removeClass('error');
$('#error_alert table').addClass('success');
$('#error_alert div.errorTextBig').html("$msg");
$('#error_alert').fadeIn('slow');
mail_tabs.tabs('remove', mail_tabs.data('selected.tabs')).tabs('select', $selectTab);
window.scrollTo(0, 0);
EOF;
        exit;
}

$email = $db->get_row("SELECT * FROM tblMails WHERE user_id = '{$_SESSION['sess_id']}' AND id = '{$_GET['id']}' LIMIT 1");

unset($_SESSION['mail_attachments'][$email['id']]);

$email['subject'] = "Re: " . str_replace(array('Fwd:','Re:'), array('', ''), $email['subject']);
$email['message'] = "\r\n\r\n\r\n\r\n\r\n------" . smarty_screenname(array('user_id' => $email['user_from'])) . " wrote:\r\n>" . htmlentities(strip_tags(str_replace('\r\n', '\r\n>', $email['message'])));

$smarty->register_function('screenname', 'smarty_screenname');
$smarty->assign("email", $email);
$smarty->display("{$cfg['template']['dir_template']}ajax/mail_reply.tpl");
?>
