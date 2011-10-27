<?php
/* $Id$ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

$lu = LiveUser::getUser();
$spammer = $db->get_row("SELECT * FROM tblUsers WHERE id = '{$_POST['spammer']}' LIMIT 1");
$spamMessage = $db->get_row("SELECT * FROM tblMails WHERE id = '{$_POST['email_id']}' LIMIT 1");

$supportMessage = <<<EOF
<div>{$lu['screenname']} reports that {$spammer['screenname']} sent
him a spam message with the subject "{$spamMessage['subject']}"</div>
<div>&nbsp;</div>
<div>~= The Dirty Flirting Anti-Spam System =~</div>
EOF;

print send_mail($cfg['mail']['support'], 'support', 'Spam alert', $supportMessage) ? 'true' : 'false';