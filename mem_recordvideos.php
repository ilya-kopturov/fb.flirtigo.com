<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 2);
/* ... sql ... */
$videos_nr = @$db->get_var("SELECT COUNT(*) as count FROM `tblVideos` WHERE `user_id` = '".$_SESSION['sess_id']."'");
/* ..end sql.. */

/* ... assign ... */
$smarty->assign('videos_nr',  $videos_nr);
/* ... end assign ... */

/* ... smarty ... */

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "recordvideos.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

/* ...end smarty ... */

include ("./includes/" . "require" . "/" . "site_foot.php");
?>