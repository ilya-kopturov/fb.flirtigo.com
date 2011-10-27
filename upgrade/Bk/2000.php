<?php

define("IN_MAINSITE", TRUE);

include ("../includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

if(isset($_GET['submit']))
{
 header_location('http://select.2000charge.com/PaymentOptions.asp?ID=8614&Language=English&Username='.$_SESSION['sess_screenname'].'&XField=&Userpassword='.$_SESSION['sess_pass'].'&Userpassword2='.$_SESSION['sess_pass']);
}
$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "2000.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );
include ("../includes/" . "require" . "/" . "site_foot.php");
?>
