<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$start = $start>0?intval($start):0;

$sql_search    = "SELECT `id` , `screenname` , `sex` , `looking` , `for` , `introtitle` , `birthdate` , `country` , `state` , `city` , `rating` , `withpicture` 
                         FROM `tblUsers` , `tblViewedProfile` 
                         WHERE `tblUsers`.`id` = `tblViewedProfile`.`viewed_user_id` AND `tblViewedProfile`.`user_id` = '" . $_SESSION['sess_id']. "'";

$search_result = $db->get_results($sql_search . " ORDER BY `rating` DESC, `withpicture` DESC LIMIT " . $start . "," . $cfg[option][profiles_per_page]);
$result_nav    = build_result_pages($sql_search, $start);

// ... functions ... //
$rateme = rateme();
//...end functions...//

// ... assign ... //
$smarty->assign("result_nav",$result_nav);
$smarty->assign("users",$search_result);
$smarty->assign("rateme", $rateme);

$smarty->assign("countries", $cfg['countries']);
$smarty->assign("states",    $cfg['states']);
//...end assign...//

// ...  smarty ... //
$smarty->register_function('age', 'smarty_age');
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('adddelete', 'smarty_adddelete');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "viewedprofile.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->register_function('age');
$smarty->register_function('looking');
$smarty->register_function('adddelete');
// ...end smarty ... //

include ("./includes/" . "require" . "/" . "site_foot.php");
?>