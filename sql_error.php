<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "error_head.php");

/* ... check session and referer ... */
if(isset($_SESSION['sess_id'])){
	$redirect = 'mem_index.php';
}elseif(isset($_SERVER['HTTP_REFERER'])){
	$redirect = $_SERVER['HTTP_REFERER'];
}else{
	$redirect = 'index.php';
}
/* ..end check session and referer.. */

/* ... assign ... */
$smarty->assign("redirect", $redirect);
/* ..end assign.. */

/* ... smarty ... */

$smarty->display( $cfg['template']['dir_template'] . "public/" . "header_members.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "sqlerror.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "footer.tpl" );

/* ..end smarty.. */

//include ("./includes/" . "require" . "/" . "site_foot.php");
?>