<?php
/* $Id: mem_index.php 704 2008-07-01 00:19:56Z bogdan $ */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

/* ... functions ... */
dfcams();
/* ..end functions.. */

/* ... video gallery ... */
$option['looking']     = (int) $_SESSION['sess_sex'];
$option['sex']         = (int) ($_SESSION['sess_looking']&(1<<0)==true?0:1);
$option['withpicture'] = 'Y';

$sql_who = videogallery($db, $option);

$videogallery = $db->get_results($sql_who . " GROUP BY v.user_id ORDER BY rand() LIMIT 8");
$videogallery = array_merge($videogallery, range(count($videogallery), 7));
/* ..end video gallery.. */

/* ... who viewed me ... */
$viewedme = $db->get_results("SELECT DISTINCT v.user_id, u.* FROM tblViewedProfile v INNER JOIN tblUsers u ON (v.user_id = u.id) WHERE viewed_user_id = '{$_SESSION['sess_id']}' ORDER BY v.date DESC LIMIT 8");
$viewedme = array_merge($viewedme, range(count($viewedme), 8));
/* ..end who viewed me.. */

/* ...picture gallery... */
$sql_who = picturegallery($db, $option);
$picturegallery = $db->get_results($sql_who . " GROUP BY p.user_id ORDER BY rand() LIMIT 8");
$picturegallery = array_merge($picturegallery, range(count($picturegallery), 7));
/* ..end picture gallery.. */

/* ... who viewed me ... */
$viewedme = $db->get_results("SELECT DISTINCT v.user_id, u.* FROM tblViewedProfile v INNER JOIN tblUsers u ON (v.user_id = u.id) WHERE viewed_user_id = '{$_SESSION['sess_id']}' ORDER BY v.date DESC LIMIT 8");
$viewedme = array_merge($viewedme, range(count($viewedme), 8));
/* ..end who viewed me.. */

/* ... hot list ... */
$hotlist = $db->get_results("SELECT DISTINCT h.user_id, u.* FROM tblHotBlockList h INNER JOIN tblUsers u ON (h.friend_user_id = u.id) WHERE h.user_id = '{$_SESSION['sess_id']}' AND h.type = 'H' LIMIT 8");
$hotlist = array_merge($hotlist, range(count($hotlist), 8));
/* ..end hot list.. */

/* ... featured faces ... */
$featured = @$db->get_results("SELECT `id`, `screenname`, `country`, `city`, `typeloc`, `typeusr`, `joined`
                               FROM   `tblUsers`
                               WHERE  `featured` = 'Y' AND 
                                      (`looking` & (1 << " . $_SESSION['sess_sex'] . ")) AND
                                      (" . $_SESSION['sess_looking'] . " & (1 << `sex`))
                               LIMIT  4");
$featured = array_merge($featured, range(count($featured), 4));
/* ..end featured faces.. */

/* ... My Messages Preview ... */
$mymessages = $db->get_results("SELECT * FROM `tblMails`
                                WHERE `user_id` = '".$_SESSION['sess_id']."' AND `folder` = '1'
                                ORDER BY `date_sent` DESC
                                LIMIT 3");
/* ..end My Messages Preview.. */

/* tags */
$tags    = $db->get_results("SELECT * FROM tblTagCount ORDER BY RAND() LIMIT 10");
$tag_sum = $db->get_var("SELECT `tag_sum` FROM `tblCounter` LIMIT 1");
/* end tags */


/* Pending and Discret Picture & Video */
    	$getPic     = $db->get_row("SELECT `approved`, `gallery`
    	                            FROM   `tblPhotos` 
    	                            WHERE  `user_id`    = '" . $_SESSION['sess_id'] . "' AND
    	                                   `photo_main` = 'Y'
    	                            LIMIT   1");
    	
    	if($getPic['approved'] == 'N'){
    		$_SESSION['sess_picturepending'] = 'Y';
    	}else{
    		$_SESSION['sess_picturepending'] = 'N';
    	}
    	
    	if($getPic['gallery'] == '0'){
    		$_SESSION['sess_picturediscret'] = 'YES';
    	}else{
    		$_SESSION['sess_picturediscret'] = 'NO';
    	}
    	
    	$getVideo   = $db->get_row("SELECT `approved`, `gallery` 
    	                            FROM   `tblVideos` 
    	                            WHERE  `user_id`    = '" . $_SESSION['sess_id'] . "' AND
    	                                   `video_main` = 'Y'
    	                            LIMIT   1");
    	
        if($getVideo['approved'] == 'N'){
    		$_SESSION['sess_videopending'] = 'Y';
    	}
    	if($getVideo['gallery'] == '0'){
    		$_SESSION['sess_videodiscret'] = 'YES';
    	}else{
    		$_SESSION['sess_videodiscret'] = 'NO';
    	}
/* ..end Pending and Discret Picture & Video.. */

/* Check Basic and Extended Profile */
$checkProfile = checkProfile($_SESSION['sess_id']);
$smarty->assign("checkProfile", $checkProfile);
/* end Check Basic and Extended Profile */

/* ... assign ... */
$smarty->assign("stats", $stats);
$smarty->assign("profile_stats", $profile_stats);

$smarty->assign("videogallery",   $videogallery);
$smarty->assign("picturegallery", $picturegallery);

$smarty->assign("viewedme",     $viewedme);
$smarty->assign("hotlist",      $hotlist);
$smarty->assign("featured",     $featured);

$smarty->assign("mymessages", $mymessages);

$smarty->assign("countries", $cfg['countries']);
$smarty->assign("states",    $cfg['states']);

$smarty->assign('tags',    $tags);
$smarty->assign('tag_sum', $tag_sum);

$smarty->assign("cams_date", date("H:i A", mktime(date("H")+1,date("i"),date("s"),date("m"),date("d"),date("Y"))));

if(isset($_GET['error'])){
$smarty->assign("error", htmlentities(strip_tags($_GET['error'])));
}

if(isset($_GET['msg'])){
$smarty->assign("msg", htmlentities(strip_tags($_GET['msg'])));
}
/* ..end assign ..*/

/* ... smarty ... */
$smarty->register_function('age', 'smarty_age');
$smarty->register_function('rateme', 'smarty_rateme');
$smarty->register_function('location', 'smarty_location');
$smarty->register_function('screenname', 'smarty_screenname');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "index.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('screenname');
$smarty->unregister_function('location');
$smarty->unregister_function('rateme');
$smarty->unregister_function('age');
/* ..end smarty.. */

include ("./includes/" . "require" . "/" . "site_foot.php");
?>