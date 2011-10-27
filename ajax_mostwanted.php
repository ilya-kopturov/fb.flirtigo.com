<?php
/**
 * DIRTYFLIRTING.COM
 * $Id: ajax_mostwanted.php 429 2008-06-03 09:40:20Z andi $
*/

define("IN_MAINSITE", TRUE);
define("IS_AJAX",     TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

/* ... most wanted ... */
$sql_search = most_wanted($db, $_GET);

$start = $_GET['start']>0?intval($_GET['start']):0;

$isAllowed = (LiveUser::isAllowed(RATE_PROFILE)) ? 1 : 0;

$search_result = @$db->get_results($sql_search . " LIMIT 10 OFFSET " . $start);
$result_nav    = build_pre_next($start, 10, "show_rateprofiles_".$_GET['tab']);
/* ..end most wanted.. */

/* ... assign ... */
$smarty->assign("result_nav", $result_nav);
$smarty->assign("users",      $search_result);

$smarty->assign("var", array("tab"      => addslashes($_GET['tab']),
							 "showme"   => (int) $_GET['showme'],
                             "of"       => (int) $_GET['of'] = isset($_GET['of'])==true?$_GET['of']:'1',
                             "age_from" => (int) $_GET['age_from'] ==0?18:$_GET['age_from'],
                             "age_to"   => (int) $_GET['age_to']   ==0?99:$_GET['age_to']));

$smarty->assign("start_from", $start-1);

$smarty->assign("isAllowed", $isAllowed);
/* ..end assign.. */


// ...  smarty  ... //
$smarty->register_function('rating', 'smarty_rating');
$smarty->register_function('remove_start', 'smarty_remove_start');

$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "mostwanted.tpl" );

$smarty->unregister_function('rating');
$smarty->unregister_function('remove_start');
// .. end smarty .. //

include ("./includes/" . "require" . "/" . "site_foot.php");
?>