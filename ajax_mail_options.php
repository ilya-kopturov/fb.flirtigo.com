<?php
define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0, 1);

if (strcmp($_GET['u'], 't') == 0) {
	@$db->query("UPDATE `tblUsers` SET `emailnotif` = '" . $_POST['email'] ."',
	                                   `whispernotif` = '" . $_POST['whisper'] ."',
	                                   `newsletternotif` = '" . $_POST['newsletter'] ."'
	                               WHERE `id` = '" . $_SESSION['sess_id'] . "'
	                               LIMIT 1");

	$msg = mysql_errno() ? "<span style='color:red'>Error:" . mysql_error(). "Your settings were not updated!</span>" : "<span style='color:lime'>Your settings have been updated!</span>";
	print <<< EOF
<script>
	$('#jqmErrorAlert').jqm(jsOptions.jqAlert);
	$('div.jqmAlertTitle span:first-child').html("$msg");
	$('#jqmErrorAlert').jqmShow();
	setTimeout(function() {
		try {
			$('#jqmErrorAlert').jqmHide();
		} catch (e) {}
	}, 2000);
</script>
EOF;
	exit;
}

$emailoptions = $db->get_row("SELECT `emailnotif`,`whispernotif`,`newsletternotif` FROM `tblUsers` WHERE `id` = '" . $_SESSION['sess_id'] . "' LIMIT 1");

$smarty->assign("emailoptions", $emailoptions);
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "mail_options.tpl" );
?>