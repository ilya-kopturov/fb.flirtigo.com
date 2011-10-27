<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);
//* ... sql read photo ... *//
$photos = @$db->get_results("SELECT * FROM `tblPhotos` WHERE `user_id` = '".$_SESSION['sess_id']."' ORDER BY `id` ASC");
//*...end sql read photo...*//

$featured      = mem_featuredPopular("small");
$stats         = stats($db);

$smarty->assign("stats", $stats);
$smarty->assign("featured", $featured);



/* ... assign ... */
$smarty->assign("photos", $photos);
$smarty->assign("photos_nr", count($photos));

if(isset($_GET['error'])){
	$smarty->assign("error",             htmlentities(strip_tags($_GET['error'])));
	$smarty->assign("photo_name",        htmlentities(strip_tags($_GET['photo_name'])));
	$smarty->assign("photo_description", htmlentities(strip_tags($_GET['photo_description'])));
}
/* ... end assign ... */

/* ... smarty ... */

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "upload.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

/* ...end smarty ... */

include ("./includes/" . "require" . "/" . "site_foot.php");
?>
