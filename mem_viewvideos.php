<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 2);

//* ... variables ...*//
$video_id = $_GET['video_id']>0?$_GET['video_id']:1;
//*...end variable...*//


//* ... sql read photo ... *//
$approved = $_SESSION['sess_id']==$_GET['id']?'':'AND `approved` = \'Y\'';
$videos   = @$db->get_results("SELECT * FROM `tblVideos` WHERE `user_id` = '". (int) $_GET['id']."' " . $approved . " ORDER BY `id` ASC");
//*...end sql read photo...*//


//* ... sql ... *//
$user  = @$db->get_row("SELECT `id`,`screenname`,`rating`, `votes` FROM `tblUsers` WHERE `id` = '". (int) $_GET['id']."' LIMIT 1");
//*...end sql...*//

//* .. assign .. *//
$smarty->assign("user",   $user);

$smarty->assign("videos", $videos);
$smarty->assign("video_id", $video_id);

$smarty->assign("nr_videos", count($videos));
//*..end assign..*//


//* ... smarty ...*//
$smarty->register_function('rateme','smarty_rateme');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "viewvideos.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('rateme');
//*...end smarty...*//

include ("./includes/" . "require" . "/" . "site_foot.php");
?>