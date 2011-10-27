<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");


if(isset($_GET['screen_name'])){
$smarty->assign("screen_name", htmlentities(strip_tags($_GET['screen_name'])));
}

$smarty->display( $cfg['template']['dir_template'] . "public/" . "header_welcome.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "welcome.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "footer.tpl" );


include ("./includes/" . "require" . "/" . "site_foot.php");
?>