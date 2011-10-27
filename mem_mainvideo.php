<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);


$p = $_GET['p']>0?$_GET['p']-1:0;

$photo_id = @$db->get_var("SELECT `id` FROM `tblVideos` WHERE `user_id` = '". (int) $_GET['id']."' ORDER BY `id` ASC LIMIT 1 OFFSET " . (int) $p);

@$db->query("UPDATE `tblVideos` SET `video_main` = 'N' WHERE `user_id` = '". (int) $_GET['id'] ."'");
@$db->query("UPDATE `tblVideos` SET `video_main` = 'Y' WHERE `user_id` = '". (int) $_GET['id'] ."' AND `id` = '". (int) $photo_id ."' LIMIT 1");



if(!empty($_SERVER['HTTP_REFERER'])){
	header_location($_SERVER['HTTP_REFERER']);
}
header_location();

include ("./includes/" . "require" . "/" . "site_foot.php");
?>