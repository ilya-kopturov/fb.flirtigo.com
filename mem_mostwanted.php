<?php
/* DIRTYFLIRTING.COM */

define("IN_MAINSITE", TRUE);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

/* ... most wanted ... */
$sql_search = most_wanted($db, $_GET);
/*
if($_GET['showme'] == 1 and $_SESSION['sess_accesslevel'] == 0){
	header("LOCATION: " . $cfg['path']['url_upgrade'] . "?id=" . $_SESSION['sess_id']);
	exit;
}
*/
/* ..end most wanted.. */

/* ... assign ... */
$_GET['using'] = ($_GET['showme'] == 1) ? 0 : $_GET['using'];

$smarty->assign("var", array("showme"   => (int) $_GET['showme'],
                             "of"       => (int) $_GET['of'] = isset($_GET['of'])==true?$_GET['of']:'1',
                             "age_from" => (int) $_GET['age_from'] ==0?18:$_GET['age_from'],
                             "age_to"   => (int) $_GET['age_to']   ==0?99:$_GET['age_to'],
                             "start"    => (int) $_GET['start'] == 0?0:$_GET['start'],
							 "using"    => (int) $_GET['using']));
/* ..end assign.. */
//var_dump($sql_search);
//die();

// ...  smarty  ... //
$smarty->register_function('screenname', 'smarty_screenname');
$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "mostwanted.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

// .. end smarty .. //

include ("./includes/" . "require" . "/" . "site_foot.php");
?>
