<?php

/* $Id: mem_profile.php 538 2008-06-13 15:53:10Z andi $ */

define("IN_MAINSITE", true);

include ("includes/require/site_head.php");

$screenname = $_GET['id'];

$profile = $db->get_row("SELECT * FROM tblUsers WHERE screenname = '{$screenname}' AND `disabled`='N' LIMIT 1");
$profile_id = $profile['id'];

if (!$profile_id) {
    if ($_SESSION['sess_id']) {
        header("Location: " . $cfg['path']['url_site'] . "mem_myprofile.php");
        exit;
    } else {
        header("Location: " . $cfg['path']['url_site'] . "?error=There isnt any profile with {$screenname} name!");
    }
}

if ($_SESSION['sess_id']) {
    @mysql_query("UPDATE tblViewedProfile SET date = NOW() WHERE user_id = '{$_SESSION['sess_id']}' AND viewed_user_id = '{$profile_id}'");
    if (mysql_affected_rows() <= 0) {
        @mysql_query("INSERT INTO tblViewedProfile (user_id, viewed_user_id, date) VALUES ('{$_SESSION['sess_id']}', '{$profile_id}', NOW())");
    }
}

dfcams();

$smarty->register_function('age', 'smarty_age');

$smarty->assign('profile', $profile);

$smarty->display("{$cfg['template']['dir_template']}{$site_section}/header.tpl");
$smarty->display("{$cfg['template']['dir_template']}login/profile.tpl");
$smarty->display("{$cfg['template']['dir_template']}$site_section/footer.tpl");

include ("includes/require/site_foot.php");
