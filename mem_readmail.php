<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 1);

/* ... submit form ... */
if(isset($_POST['delete_x']) OR isset($_POST['delete']) OR isset($_POST['delete_y']))
{
	$e_folder = @$db->get_var("SELECT `folder` FROM `tblMails` WHERE `id` = '". (int) $_POST['e_id']."' LIMIT 1");
	
	if($e_folder == 3){
		@$db->query("DELETE FROM `tblMails` WHERE `id` = '". (int) $_POST['e_id']."' LIMIT 1");
	} else {
		@$db->query("UPDATE `tblMails` SET `folder` = '3' WHERE `id` = '". (int) $_POST['e_id']."' LIMIT 1");
	}
	
	header_location($cfg['path']['url_site'] . 'mem_mail.php?folder=inbox');
}
/* ..end submit form.. */


/* ... read e-mail from db ... */
$email = $db->get_row("SELECT * FROM `tblMails` WHERE `tblMails`.`id` = '". (int) $_GET['e_id']."' AND `user_id` = '".$_SESSION['sess_id']."'");
/* ...end of reading email ... */


/* ... sql ...*/
$update_new = @$db->query("UPDATE `tblMails` SET `new` = 'N' WHERE `id`       = '" . (int) $_GET['e_id'] ."' AND `user_to` = '".$_SESSION['sess_id']."'");
$update_new = @$db->query("UPDATE `tblMails` SET `new` = 'N' WHERE `id_to_id` = '" . (int) $_GET['e_id'] ."' AND `user_to` = '".$_SESSION['sess_id']."'");
/*...end sql...*/

/* ... assign ... */
$smarty->assign("folder", $folder);
$smarty->assign("email", $email);

if(isset($_GET['error']))
{
	$smarty->assign("error", htmlentities(strip_tags($_GET['error'])));
}

if(isset($_GET['msg']))
{
	$smarty->assign("msg", htmlentities(strip_tags($_GET['msg'])));
}
/* ..end assign.. */

/* ... smarty ...*/
$smarty->register_function('screenname', 'smarty_screenname');
$smarty->register_function('addblock',   'smarty_addblock');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "readmail.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('screenname');
$smarty->unregister_function('addblock');
/* ...end smarty...*/

include ("./includes/" . "require" . "/" . "site_foot.php");
?>