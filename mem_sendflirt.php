<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], $_SESSION['access_level']);
//* ... form submit ... *//

echo "test";


if(isset($_POST['send_whisper']) OR isset($_POST['send_whisper_x']))
{
	if(!reachedflirt($_SESSION['sess_id']) or $_SESSION['sess_accesslevel'] > 0){
		if(!checkflirt($_SESSION['sess_id'], $_POST['id'])){
			if(!relationship($_POST['id'],$_SESSION['sess_id'],"B"))
			{
				$redirect_to = "mem_mail.php?folder=inbox";
				$whisper_id = $_POST['whisper'];
				
				$message = @$db->get_var("SELECT `whisper` FROM `tblWhispers` WHERE `id` = '" . (int) $_POST['whisper'] . "'");
				$message = "<img align='absmiddle' src='".$cfg['path']['url_site']."/images/".$_POST['whisper'].".gif' border='0'> <b>" . $message . "</b>";
				
				mailermachine($db,'whispernotif','new_whisper','internal',$_POST['id'],$_SESSION['sess_id']);
				mailermachine($db,'whispernotif','new_whisper','external',$_POST['id'],$_SESSION['sess_id']);
				
				@$db->query("INSERT INTO `tblWhispersSent` (`from`,`to`,`date`) VALUES ('" . $_SESSION['sess_id'] . "','" . $_POST['id'] . "',NOW())");
			}
			$msg = "Flirt was succesfully sent.";
		}else{
			$error = "Error: You have allready sent a flirt to " . id_to_screenname($_POST['id']) . ". Try an email instead!";
		}
	}else{
		$error = "Error: Your daily limit of free Whispers has been reached.<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please upgrade to be able to send further flirts.";
	}
}
//*...end form submit...*//

//* ... sql ... *//
$user      = $db->get_row("SELECT `id`,`screenname` FROM `tblUsers` WHERE `id` = '" . (int) $_GET['id'] . "' LIMIT 1");
$whispers  = $db->get_results("SELECT `id`, `whisper` FROM `tblWhispers`");
//*.. end sql ..*//

//*...  assign  ...*//
$smarty->assign("user", $user);
$smarty->assign("whispers", $whispers);

$smarty->assign("msg", $msg);
$smarty->assign("error", $error);
//*...end assign...*//

//* ... smarty ...*//

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "sendflirt.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

//*..end smarty ..*//

include ("./includes/" . "require" . "/" . "site_foot.php");
?>