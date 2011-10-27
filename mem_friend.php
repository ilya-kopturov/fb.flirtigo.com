<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

/* ... ignore list ... */
$start = $_GET['start']>0?intval($_GET['start']):0;

$sql_search    = "SELECT `id`, `screenname`, `sex`, `looking`, `for`, `introtitle`, `birthdate`, `height`, `weight`, `country`, `state`, `city`, `rating`, `typeusr`, `typeloc`, `withpicture`, `withvideo` 
                         FROM `tblUsers`, `tblHotBlockList` 
                         WHERE `tblUsers`.`id` = `tblHotBlockList`.`friend_user_id` AND `tblHotBlockList`.`user_id` = " . $_SESSION['sess_id']. " AND `tblHotBlockList`.`type` = 'H'";

$search_result = $db->get_results($sql_search . " ORDER BY `rating` DESC, `withpicture` DESC LIMIT " . $start . "," . $cfg[option][profiles_per_page]);
$result_nav    = build_result_pages($sql_search, $start);
/* ..end ignore list.. */

/* ... sql ... */


/* ..end sql.. */

/* ... assign ... */


$smarty->assign("result_nav",$result_nav);
$smarty->assign("users",$search_result);

$smarty->assign("countries", $cfg['countries']);
$smarty->assign("states",    $cfg['states']);
/* ..end assign.. */

/* ...  smarty ... */
$smarty->register_function('age', 'smarty_age');
$smarty->register_function('online', 'smarty_online');
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('location', 'smarty_location');
$smarty->register_function('adddelete', 'smarty_adddelete');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "ignore.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('age');
$smarty->unregister_function('online');
$smarty->unregister_function('looking');
$smarty->unregister_function('location');
$smarty->unregister_function('adddelete');
/* ...end smarty ... */


include ("./includes/" . "require" . "/" . "site_foot.php");
?>