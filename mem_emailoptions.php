<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

/* ... form submit ... */
if(isset($_POST['submit']) or isset($_POST['submit_x'])){
	@$db->query("UPDATE `tblUsers` SET `emailnotif` = '" . $_POST['email'] ."',
	                                   `whispernotif` = '" . $_POST['whisper'] ."',
	                                   `newsletternotif` = '" . $_POST['newsletter'] ."'
	                               WHERE `id` = '" . $_SESSION['sess_id'] . "'
	                               LIMIT 1");
	
	if(mysql_affected_rows() > 0){
		$_GET['msg'] = 'Your Preferences have been updated';
	}
}
/* ..end form submit.. */

/* ... sql ... */
$emailoptions = $db->get_row("SELECT `emailnotif`,`whispernotif`,`newsletternotif` FROM `tblUsers` WHERE `id` = '" . $_SESSION['sess_id'] . "' LIMIT 1");
/* ..end sql.. */

/* ... functions ... */
$featured      = mem_featuredPopular("small");
$stats         = stats($db);
/* ..end functions.. */

/* ... assign ... */
$smarty->assign("stats", $stats);
$smarty->assign("featured", $featured);

$smarty->assign("emailoptions", $emailoptions);


if(isset($_GET['error']))
{
	$smarty->assign("error", htmlentities(strip_tags($_GET['error'])));
}

if(isset($_GET['msg']))
{
	$smarty->assign("msg", htmlentities(strip_tags($_GET['msg'])));
}
/* ..end assign.. */


/* ... smarty ... */

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "emailoptions.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

/* ..end smarty.. */

include ("./includes/" . "require" . "/" . "site_foot.php");
?>