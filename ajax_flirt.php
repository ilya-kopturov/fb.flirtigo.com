<?php
/* $Id: ajax_flirt.php 531 2008-06-12 21:02:43Z andi $ */

define("IN_MAINSITE", true);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

$uid = $_SESSION['sess_id'];
if (strcmp($_GET['u'], 't') == 0) {
	$whisper_id = $flirt_id = (int)$_POST['id'];
	$to = (int)$_POST['to'];
	
	$flirtValid = $db->get_var("SELECT COUNT(*) as flirtValid
	                            FROM   `tblTempFlirts`
	                            WHERE  `from` = '". $uid ."' AND `to`   = '". $to  ."'");
	if(!$flirtValid){
		$flirt = $db->get_var("SELECT whisper FROM tblWhispers WHERE id = '$flirt_id' LIMIT 1");
		$whisper_details = "<img align='absmiddle' src='".$cfg['path']['url_site']."/images/".$flirt_id.".gif' border='0'><br><b>" . $flirt . "</b>";		                                
		
		mailermachine($db, 'emailnotif', 'new_whisper', 'internal', $to, $uid);
		mailermachine($db, 'emailnotif', 'new_whisper', 'external', $to, $uid);
		$db->query("INSERT INTO `tblTempFlirts` (`from`,`to`,`date`) VALUES ($uid, $to, NOW())");
		print <<<EOF
$('#flirt_popup').jqmHide().remove();
alert('Dirty Flirt sent.');
EOF;
	}else{
		print <<<EOF
$('#flirt_popup').jqmHide().remove();
alert('You have already sent a flirt to this member, try email instead..');
EOF;
	}
	exit;
}
$flirts = $db->get_results("SELECT * FROM tblWhispers ORDER BY id");

$smarty->assign("flirts", $flirts);
$smarty->display("{$cfg['template']['dir_template']}ajax/flirt.tpl");