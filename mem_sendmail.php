<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 1);
/* ... form submit ... */
if(isset($_POST['sendmessage']) or isset($_POST['sendmessage_x']))
{
	$redirect_to = "mem_mail.php?folder=inbox";
	
	$subject  = htmlentities(strip_tags(trim($_POST['subject'])))?htmlentities(strip_tags(trim($_POST['subject']))):'(no subject)';
	$to       = htmlentities(strip_tags(trim($_POST['to_favorite'])))!=''?htmlentities(strip_tags(trim($_POST['to_favorite']))):htmlentities(strip_tags(trim($_POST['to'])));
	$intto    = (int) $to;
	if(strcmp($to, $intto) != 0){
		$to       = @$db->get_var("SELECT `id` FROM `tblUsers` WHERE `screenname` = '" . $to . "' LIMIT 1");
	}
	$message  = htmlentities(strip_tags(trim($_POST['message'])));
	 
	//if(strtolower($_POST['sendmail_code']) == strtolower($_SESSION['active_code']))
	//{
		$error = sent_message($db, $to, $subject, $message, 1);
		if(!$error){
			header_location($cfg['path']['url_site'] . "mem_mail.php?msg=" . urlencode("Message was sent.") );
		}
	//} else {
		//$error = "Security code you typed was wrong, try again!";
	//}
}
elseif(isset($_POST['reload_pic']))
{
	$subject = htmlentities(strip_tags(trim($_POST['subject'])));
	$to      = htmlentities(strip_tags(trim($_POST['to'])));
	$message = htmlentities(strip_tags(trim($_POST['message'])));
}
else
{
	$to      = (int)$_GET['id']?@$db->get_var("SELECT `screenname` FROM `tblUsers` WHERE `id` = '" . $_GET['id'] . "' LIMIT 1"):'';
	$subject = htmlentities(strip_tags($_GET['e_id']))?@$db->get_var("SELECT `subject` FROM `tblMails` WHERE `id` = '" . $_GET['e_id'] . "' LIMIT 1"):'';
	$subject = htmlentities(strip_tags($_GET['reply']))?"Re: " . str_replace(array('Fwd:','Re:'),array('',''),$subject):$subject;
	$subject = htmlentities(strip_tags($_GET['forward']))?"Fwd: " . str_replace(array('Fwd:','Re:'),array('',''),$subject):$subject;
	$message = (int)$_GET['e_id']?"\r\n\r\n\r\n\r\n\r\n------" . $to . " wrote:\r\n>" . htmlentities(strip_tags(str_replace('\r\n','\r\n>',@$db->get_var("SELECT `message` FROM `tblMails` WHERE `id` = '" . $_GET['e_id'] . "' LIMIT 1")))):'';
}
/*...end form submit...*/

/* ... code verification ... */
$_SESSION["active_code"] = verify(6);
/* ..end code verification.. */

/* ... favorite list ... */
$favorite = favorite_list($_SESSION['sess_id']);
/* ..end favorite list.. */

/* ... functions ... */
$featured      = mem_featuredPopular("small");
$stats         = stats($db);
/* ..end functions.. */

/* ... assign ... */
$smarty->assign("stats", $stats);
$smarty->assign("featured", $featured);

$smarty->assign('favorite_list',  $favorite);

$smarty->assign("to", $to);
$smarty->assign("subject", $subject);
$smarty->assign("message", $message);
$smarty->assign("savemail", $savemail);

$smarty->assign("error", $error);
/*...end assign...*/

/* ... smarty ...*/
$smarty->register_function('screenname', 'smarty_screenname');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "sendmail.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('screenname');
//* ...end smarty...*//

include ("./includes/" . "require" . "/" . "site_foot.php");
?>