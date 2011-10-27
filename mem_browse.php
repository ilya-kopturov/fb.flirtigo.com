<?php

/* DIRTYFLIRTING.COM */

define("IN_MAINSITE", TRUE);

include ("./includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$steps = array(
    'location',
    'looking_for',
);

$step = isset($_GET['step']) ? $_GET['step'] : current($steps);

switch ($step) {
    case 'looking_for':


        break;

    case 'location':
        $eu_countries = $db->get_results("SELECT `id`, `country` 
		                                   FROM `ip2nationCountries` 
		                                   WHERE `area` = 'EU' OR `code` = 'uk'
		                                   ORDER BY `country` ASC");
        $row_countries = $db->get_results("SELECT `id`, `country` 
		                                   FROM `ip2nationCountries` 
		                                   WHERE `area` = 'ROW' OR `code` = 'ca' OR `code` = 'au'
		                                   ORDER BY `country` ASC");


        $smarty->assign("countries", $cfg['countries']);
        $smarty->assign("states", $cfg['states']);

        $smarty->assign("usa_states", $cfg['usa_states']);

        $smarty->assign("eu_countries", $eu_countries);
        $smarty->assign("row_countries", $row_countries);

        break;
}

// ...    smarty    ... //
$smarty->display($cfg['template']['dir_template'] . "login/header.tpl");
$smarty->display($cfg['template']['dir_template'] . "login/browse_{$step}.tpl");
$smarty->display($cfg['template']['dir_template'] . "login/footer.tpl");
// ...    smarty    ... //

include ("./includes/require/site_foot.php");
?>