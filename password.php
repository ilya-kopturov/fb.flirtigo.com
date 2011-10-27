<?php
/* $Id: password.php 526 2008-06-11 18:18:30Z andi $ */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

/* ... submit form ... */
if(isset($_POST['forgot_submit_x']) or isset($_POST['forgot_submit']))
{
	if (forgot_password($db, $_POST['email'])) {
		$smarty->assign("msg", "Your login details has been sent to your email.");
	} else {
		$smarty->assign("error", "Email not found.");
	}
}
/* ..end submit form.. */

/* ... smarty ... */
$smarty->display( $cfg['template']['dir_template'] . "public/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "password.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "footer.tpl" );
/* ..end smarty.. */

include ("./includes/" . "require" . "/" . "site_foot.php");
?>