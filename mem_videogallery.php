<?php
/* $Id$ */
/* DIRTYFLIRTING.COM */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");
include_once("MDB2.php");
include_once("Pager/Pager.php");
include_once("includes/class/Pager_Wrapper.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

/* ... whos online ... */
$start = $_GET['pageID'] > 0 ? intval(($_GET['pageID'] -1) * $cfg['option']['profiles_per_page']) : 0;
$orderby = $_GET['tag'] ? 'p.id IS NULL, RAND()' : orderby((int) $_GET['looking'], (int) $_GET['sex']);
$orderby = "u.rating DESC";

$_GET['looking'] = (int) isset($_GET['looking'])== true ? $_GET['looking'] : $_SESSION['sess_sex'];
$_GET['sex']     = (int) isset($_GET['sex'])    == true ? $_GET['sex']     : ($_SESSION['sess_looking']&(1<<0)==true?0:1);

$sql_search = videogallery($db, $_GET);

$search_result = $db->get_results($sql_search . " ORDER BY " . $orderby . " LIMIT " . $cfg['option']['profiles_per_page'] . " OFFSET " . $start);



if (count($search_result) == 0) {
	$_GET['msg'] = "The search returned no results";
}

$pagerOptions = array(
	'mode'    => 'Jumping',
	'delta'   => 10,
	'perPage' => $cfg['option']['profiles_per_page'],
);

$paged_data = Pager_Wrapper_MDB2($db, $sql_search, $pagerOptions);
/* ..end whos online.. */


/* ... assign ... */

$smarty->assign('get', $_GET);

$smarty->assign("users",$search_result);

$smarty->assign("countries", $cfg['countries']);
$smarty->assign("states",    $cfg['states']);

$smarty->assign("online", $_GET['online']==1?1:0);
$smarty->assign("pager", $paged_data);
// ... end assign ... //


// ...    smarty    ... //
$smarty->register_function('age', 'smarty_age');
$smarty->register_function('online', 'smarty_online');
$smarty->register_function('rateme', 'smarty_rateme');
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('location', 'smarty_location');
$smarty->register_function('lastlogin', 'smarty_lastlogin');
$smarty->register_function('adddelete', 'smarty_adddelete');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "videogallery.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('age');
$smarty->unregister_function('online');
$smarty->unregister_function('rateme');
$smarty->unregister_function('looking');
$smarty->unregister_function('location');
$smarty->unregister_function('lastlogin');
$smarty->unregister_function('adddelete');
// ...    smarty    ... //

include ("./includes/" . "require" . "/" . "site_foot.php");
?>