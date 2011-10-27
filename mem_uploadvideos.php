<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 2);
//* ... sql read video ... *//
$videos = @$db->get_results("SELECT * FROM `tblVideos` WHERE `user_id` = '".$_SESSION['sess_id']."' ORDER BY `id` ASC");
//*...end sql read video...*//

/* ... assign ... */
$smarty->assign("videos",    $videos);
$smarty->assign("videos_nr", count($videos));

if(isset($_GET['error'])){
	$smarty->assign("error",             htmlentities(strip_tags($_GET['error'])));
	$smarty->assign("video_name",        htmlentities(strip_tags($_GET['video_name'])));
	$smarty->assign("video_description", htmlentities(strip_tags($_GET['video_description'])));
}
/* ... end assign ... */

/* ... smarty ... */

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "uploadvideos.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

/* ...end smarty ... */

include ("./includes/" . "require" . "/" . "site_foot.php");
?>