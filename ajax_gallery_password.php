<?php
/* $Id: ajax_gallery_password.php 343 2008-05-20 19:32:51Z andi $ */


define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include("includes/require/site_head.php");

$msg = 'You need to login to use this function or join now.';
if ($from = $_SESSION['sess_id']) {
	if ($t = base64_decode($_GET['t'])) {
		$rc4->decrypt($t);
		list($type, $to) = unserialize(base64_decode($t));
	} else {
		$to = (int)$_GET['id'];
	}

	if (!$to || !$from) $msg = 'Request not understood.';
	else {
		switch ($type) {
			case 'a':
				mailermachine($db, null, 'accept_request', 'internal', $to, $from);
				mailermachine($db, 'emailnotif', 'accept_request', 'external', $to, $from);
				$msg = 'Password sent.';
				break;
			case 'd':
				mailermachine($db, null, 'deny_request', 'internal', $to, $from);
				mailermachine($db, 'emailnotif', 'deny_request', 'external', $to, $from);
				$msg = 'Deny message sent.';
				break;
			default:
				mailermachine($db, null, 'request_password', 'internal', $to, $from);
				mailermachine($db, 'emailnotif', 'request_password', 'external', $to, $from);
				$msg = 'Request sent.';
		}
	}
}

?>

<?= $msg ?>
