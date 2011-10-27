<?php
/* $Id$ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

/* ... set view ... */
$view = (int) $_GET['view']>0?(int)$_GET['view']:0;
/* ..end set view.. */

/* ... get plugins ... */
if($view == 2){
	$plugins = @$db->get_results("SELECT t1.*, IFNULL((t1.rate/t1.votes),0.00) as rating  FROM tblMembersClub t1
	                              join tblFavoritePlugins t2 ON t1.id = t2.plugin_id
	                              WHERE t2.user_id = '" . $_SESSION['sess_id'] . "'
	                              ORDER BY t1.views DESC, rating DESC, t1.votes DESC
	                              LIMIT 0, 5");
}elseif($view == 3){
	$plugins = @$db->get_results("SELECT *, IFNULL((rate/votes),0.00) as rating  FROM tblMembersClub ORDER BY rating DESC, votes DESC LIMIT 10");
}else{
	$plugins = @$db->get_results("SELECT *, IFNULL((rate/votes),0.00) as rating  FROM tblMembersClub ORDER BY rating DESC, votes DESC LIMIT 10");
}
/* ..end get plugins.. */

/* ... assign ... */
$smarty->assign("plugins", $plugins);
$smarty->assign("most",    $most);
$smarty->assign("view",    $view);
/* ..end assign.. */

/* ... smarty ... */
$smarty->register_function('rating', 'smarty_plugin_rating');

$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "xtras_sites.tpl");

$smarty->unregister_function('rating');
?>