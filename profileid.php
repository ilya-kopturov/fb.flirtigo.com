<?php
/* DIRTYFLIRTING.COM               */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

/* ... update linked to ... */
@$db->query("UPDATE `tblUsers` SET `linked` = `linked` + 1 WHERE `id` = '" . (int) $_GET['profile'] . "' LIMIT 1");
/* ..end update linked to.. */

/* ... sql ... */
$user      = $db->get_row("SELECT * FROM `tblUsers` WHERE `id` = '" . (int) $_GET['profile'] . " AND `disabled`='N' ' LIMIT 1");



/* ..end sql.. */


/* ... assign ... */
$smarty->assign("user", $user);

$smarty->assign("page_title", TRUE);

$smarty->assign("countries", $cfg['countries']);
$smarty->assign("states",    $cfg['states']);
/* ..end assign.. */

/* ... smarty ... */
$smarty->register_function('age',              'smarty_age');
$smarty->register_function('forr',             'smarty_forr');
$smarty->register_function('rating',           'smarty_rating');
$smarty->register_function('online',           'smarty_online');
$smarty->register_function('looking',          'smarty_looking');
$smarty->register_function('adddelete',        'smarty_adddelete');
$smarty->register_function('sexualactivities', 'smarty_sexualactivities');

$smarty->display( $cfg['template']['dir_template'] . "public/" . "header_members.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "profileid.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "footer.tpl" );

$smarty->unregister_function('age');
$smarty->unregister_function('forr');
$smarty->unregister_function('rating');
$smarty->unregister_function('online');
$smarty->unregister_function('looking');
$smarty->unregister_function('adddelete');
$smarty->unregister_function('sexualactivities');
/* ..end smarty.. */

include ("./includes/" . "require" . "/" . "site_foot.php");
?>