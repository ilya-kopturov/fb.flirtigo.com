<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

/* ... new mail ...*/
$_SESSION["sess_newmails"] = 0;
$_SESSION["sess_newmails"] = number_format(@$db->get_var("SELECT COUNT(*) FROM `tblMails` WHERE `user_id` = '".$_SESSION['sess_id']."' AND `folder` = '1' AND `new` = 'Y'"), 0, '', '');

$new['emails'] = number_format(@$db->get_var("SELECT COUNT(*) FROM `tblMails` WHERE `user_id` = '".$_SESSION['sess_id']."' AND `folder` = '1' AND `new` = 'Y' AND `type` = 'E'"), 0, '', '');
$new['flirts'] = number_format(@$db->get_var("SELECT COUNT(*) FROM `tblMails` WHERE `user_id` = '".$_SESSION['sess_id']."' AND `folder` = '1' AND `new` = 'Y' AND `type` = 'F'"), 0, '', '');
/* ..end new mail.. */

/* ... update mailopened variable ... */
@$db->query("UPDATE `tblUsers` SET `mailopened` = 'Y' WHERE `mailopened` = 'N' AND `id` = '" . $_SESSION['sess_id'] . "' ORDER by id ASC LIMIT 1");
/* ..end update mailopened variabile.. */

/* .. assign variables .. */
$mail_folders = array('inbox' => 1, 'outbox' => 2, 'trash' => 3);
$folder = $_GET['folder']?$_GET['folder']:'none';
/*..end assign variables..*/

/* ... submit form ... */
if(isset($_GET['delete']) AND $_GET['delete'] == 'delete'){
	//$_POST['msg'] = array_values($_POST['msg']);
	//for($e_id = 0; $e_id <= count($_POST['msg']); $e_id++)
	//{
		//if($_POST['msg'][$e_id])
		//{
			if($folder == 'inbox' or $folder == 'outbox'){
				@$db->query("UPDATE `tblMails` SET `folder` = '" . $mail_folders['trash'] . "' WHERE `user_id`= '" . (int) $_SESSION['sess_id'] . "' AND `id` = '". (int) $_GET['e_id']."' ORDER by id ASC LIMIT 1");
			} else {
				@$db->query("DELETE FROM `tblMails` WHERE `user_id`= '" . (int) $_SESSION['sess_id'] . "' AND `id` = '". (int) $_GET['e_id']."' ORDER by id ASC LIMIT 1");
			}
		//}
	//}
	header("Location: " . $cfg['path']['url_site'] . "mem_mail.php?folder=" . $folder);
	exit;
}
/* ..end submit form.. */

/* ... read e-mails from db ... */
$emails = $db->get_results("SELECT * FROM `tblMails` 
                                     WHERE `user_id` = '".$_SESSION['sess_id']."' AND 
                                           `folder` = '".$mail_folders[$folder]."'
                                     ORDER BY `date_sent` DESC");
/* ...end of reading emails ... */

/* ... functions ... */
//$rateme        = rateme();
$featured      = mem_featuredPopular("small");
$stats         = stats($db);
/* ..end functions.. */

/* ... assign ... */
$smarty->assign("stats", $stats);
$smarty->assign("featured", $featured);
$smarty->assign("folder", $folder);
$smarty->assign("emails", $emails);

$smarty->assign("new", $new);


if(isset($_GET['error']))
{
	$smarty->assign("error", htmlentities(strip_tags($_GET['error'])));
}


if(isset($_GET['msg']))
{
	$smarty->assign("msg", htmlentities(strip_tags($_GET['msg'])));
}
/*...end assign...*/

/* ... smarty ...*/
$smarty->register_function('screenname', 'smarty_screenname');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "standard.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('screenname');
/* ...end smarty...*/

include ("./includes/" . "require" . "/" . "site_foot.php");
?>
