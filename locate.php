<?php
/* $Id: locate.php 436 2008-06-03 11:18:05Z root $ */

define("IN_MAINSITE", TRUE);

include_once("includes/require/site_head.php");
include_once("MDB2.php");
include_once("Pager/Pager.php");
include_once("includes/class/Pager_Wrapper.php");

if (isset($_GET['login']) or isset($_GET['login_x']) or isset($_GET['login_y'])) {
	$_GET['sex'] = (int) $cfg['option']['sex_looking'][$_GET['sex_looking']]['sex'];
	$_GET['looking'] = (int) $cfg['option']['sex_looking'][$_GET['sex_looking']]['looking'];
	$_GET['country'] = (int) $_GET['country'];
	$_GET['state'] = (int) $_GET['state'];
	$_GET['age_from'] = (int) $_GET['age_from'];
	$_GET['age_to'] = (int) $_GET['age_to'];
	$_GET['start'] = (int) $_GET['start'];
}
else {
	header_location($cfg['path']['url_site']);
	exit(0);
}

$sql_search = search_results($db, $_GET);
$pagerOptions = array(
	'mode'    => 'Jumping',
	'delta'   => 10,
	'perPage' => $cfg['option']['profiles_per_page'],
);

//print "$sql_search ORDER BY lastlogin DESC";
$paged_data = Pager_Wrapper_MDB2($db, "$sql_search ORDER BY lastlogin DESC", $pagerOptions);

$smarty->assign("page", "quicksearch");
$smarty->assign("countries",  $cfg['countries']);
$smarty->assign("states",     $cfg['states']);
$smarty->assign("result_nav", $result_nav);
$smarty->assign("users",      $paged_data['data']);
$smarty->assign("pager", $paged_data);

if (isset($_GET['error'])) $smarty->assign("error", htmlentities(strip_tags($_GET['error'])));
if (isset($_GET['msg'])) $smarty->assign("msg", htmlentities(strip_tags($_GET['msg'])));

$smarty->register_function('age', 'smarty_age');
$smarty->register_function('online', 'smarty_online');
$smarty->register_function('rateme', 'smarty_rateme');
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('lastlogin', 'smarty_lastlogin');
$smarty->register_function('adddelete', 'smarty_adddelete');
$smarty->register_function('location', 'smarty_location');

$smarty->display("{$cfg['template']['dir_template']}public/header.tpl" );
$smarty->display("{$cfg['template']['dir_template']}public/search.tpl" );
$smarty->display("{$cfg['template']['dir_template']}public/footer.tpl" );

$smarty->unregister_function('age');
$smarty->unregister_function('online');
$smarty->unregister_function('rateme');
$smarty->unregister_function('looking');
$smarty->unregister_function('lastlogin');
$smarty->unregister_function('adddelete');

include ("includes/require/site_foot.php");
?>
