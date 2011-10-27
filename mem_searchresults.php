<?php
/* $Id: mem_searchresults.php 413 2008-05-31 04:37:21Z andi $ */

define("IN_MAINSITE", TRUE);

include_once("includes/require/site_head.php");
include_once("MDB2.php");
include_once("Pager/Pager.php");
include_once("includes/class/Pager_Wrapper.php");

$site_section = $_SESSION['sess_id'] ? 'login' : 'public';
if ($site_section == 'login') check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], SEARCH);
//var_dump($_GET);
/*
if(!trim($_GET['city']) AND $_GET['searchtype'] != 'guest'){
	header("Location: " . $cfg['path']['url_site'] . "mem_searchbasic.php" . "?error=" . "Please select city!");
	exit;
}
*/

/* tag search */
if(isset($_GET['tag']) and !isset($_GET['sex'])){
	$_GET['sex'] = 1;
}
/* end */

$sql_search = search_results($db, $_GET);

$start = $_GET['pageID'] > 0 ? intval(($_GET['pageID'] -1) * $cfg['option']['profiles_per_page']) : 0;
$orderby = $_GET['tag'] ? 'p.id IS NULL, RAND()' : orderby((int) $_GET['looking'], (int) $_GET['sex']);

//print($sql_search . " ORDER BY " . $orderby . " LIMIT " . $cfg['option']['profiles_per_page'] . " OFFSET " . $start);
/*
if ($db->num_rows == 0) {
	$next = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
	header("Location: " . $cfg['path']['url_site'] . substr($next,1) . "?error=" . "The search returned no results");
	exit;
}
*/
//$result_nav    = build_result_pages($sql_search, $start);

$pagerOptions = array(
	'mode'    => 'Jumping',
	'delta'   => 10,
	'perPage' => $cfg['option']['profiles_per_page'],
);

$paged_data = Pager_Wrapper_MDB2($db, $sql_search . " ORDER BY " . $orderby, $pagerOptions);

//print_r($paged_data);
//$paged_data['data'];  //paged data
//$paged_data['links']; //xhtml links for page navigation
//$paged_data['page_numbers']; //array('current', 'total');

/*
$featured      = mem_featuredPopular("small");
$stats         = stats($db);
*/

$smarty->assign("stats", $stats);
$smarty->assign("featured", $featured);
$smarty->assign("result_nav",$result_nav);
$smarty->assign("users",$paged_data['data']);
$smarty->assign("countries", $cfg['countries']);
$smarty->assign("states",    $cfg['states']);
$smarty->assign("onlinelink", createlink("online=1", 1));
$smarty->assign("resultslink", createlink("online=1", 0));
$smarty->assign("online", $_GET['online']==1?1:0);
$smarty->assign("pager", $paged_data);

$smarty->register_function('age', 'smarty_age');
$smarty->register_function('online', 'smarty_online');
$smarty->register_function('rateme', 'smarty_rateme');
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('location', 'smarty_location');
$smarty->register_function('lastlogin', 'smarty_lastlogin');
$smarty->register_function('adddelete', 'smarty_adddelete');

$smarty->display("{$cfg['template']['dir_template']}{$site_section}/header.tpl");
$smarty->display("{$cfg['template']['dir_template']}login/searchresults.tpl" );
$smarty->display("{$cfg['template']['dir_template']}login/footer.tpl" );

$smarty->unregister_function('age');
$smarty->unregister_function('online');
$smarty->unregister_function('rateme');
$smarty->unregister_function('looking');
$smarty->unregister_function('lastlogin');
$smarty->unregister_function('location');
$smarty->unregister_function('adddelete');
// ...  end smarty   ... //

include ("includes/require/site_foot.php");
?>
