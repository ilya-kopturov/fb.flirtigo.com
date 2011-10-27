<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 1);

/* ... sql ... */


/* ..end sql.. */

/* ... assign ... */


$smarty->assign("states",    $cfg['states']);
$smarty->assign("countries", $cfg['countries']);
/* ..end assign.. */


// ...  smarty  ... //
$smarty->register_function('age', 'smarty_age');
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('adddelete', 'smarty_adddelete');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "concierge.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('age');
$smarty->register_function('looking');
$smarty->register_function('adddelete');
// .. end smarty .. //

include ("./includes/" . "require" . "/" . "site_foot.php");
?>