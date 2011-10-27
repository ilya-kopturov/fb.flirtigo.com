<?php
/**
 * DIRTYFLIRTING.COM
 * $Id: ajax_mostwanted_large.php 429 2008-06-03 09:40:20Z andi $
*/

define("IN_MAINSITE", TRUE);
define("IS_AJAX",     TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0, 1);

/* ... most wanted ... */
$sql_search = most_wanted($db, $_GET);

if($_GET['showme'] == 1 and $_SESSION['sess_accesslevel'] == 0){
	header("LOCATION: " . $cfg['path']['url_upgrade'] . "?id=" . $_SESSION['sess_id']);
	exit;
}

$start = $_GET['start']>0?intval($_GET['start']):0;

$search_result = @$db->get_results($sql_search . " LIMIT 1 OFFSET " . $start);
$result_nav    = build_pre_next($start, 1, "show_rateprofiles_".$_GET['tab']);
/* ..end most wanted.. */

/* ... assign ... */
$smarty->assign("result_nav", $result_nav);
$smarty->assign("users",      $search_result);

$smarty->assign("var", array("tab"      => addslashes($_GET['tab']),
                             "showme"   => (int) $_GET['showme'],
                             "of"       => (int) $_GET['of'] = isset($_GET['of'])==true?$_GET['of']:'1',
                             "age_from" => (int) $_GET['age_from'] ==0?18:$_GET['age_from'],
                             "age_to"   => (int) $_GET['age_to']   ==0?99:$_GET['age_to']));
/* ..end assign.. */


// ...  smarty  ... //
$smarty->register_function('age', 'smarty_age');
$smarty->register_function('rating', 'smarty_rating');
$smarty->register_function('location', 'smarty_location');

$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "mostwanted_large.tpl" );

$smarty->unregister_function('age');
$smarty->unregister_function('rating');
$smarty->unregister_function('location');
// .. end smarty .. //

include ("./includes/" . "require" . "/" . "site_foot.php");