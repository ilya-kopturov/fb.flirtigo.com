<?php

/* $Id: login.php 354 2008-05-28 03:14:18Z andi $ */

define("IN_MAINSITE", TRUE);

include ($cfg['path']['dir_include'] . "require/site_head.php");

if (isset($_POST['screenname']) && isset($_POST['pass'])) {
    $sql_login = "
		SELECT `id`, `screenname`, `pass`, `sex`, `typeusr`, `looking`, `rating`, `votes`, `city`, 
		`country`, `state`, `accesslevel`, `withpicture`, `withvideo`
		FROM `tblUsers`
		WHERE `screenname` = '" . addslashes($_POST['screenname']) . "' AND `pass` = '" . addslashes($_POST['pass']) . "'
	";
    if ($result = $db->get_row($sql_login . " AND `disabled` = 'N'")) {
        $_SESSION['login_type'] = 1; // 1 - standard form login flag
        $_SESSION["sess_id"] = $result['id'];
        $_SESSION["sess_screenname"] = $result['screenname'];
        $_SESSION["sess_pass"] = $result['pass'];
        $_SESSION["sess_sex"] = $result['sex'];
        $_SESSION["sess_typeusr"] = $result['typeusr'];
        $_SESSION["sess_looking"] = $result['looking'];
        $_SESSION["sess_accesslevel"] = $result['accesslevel'];
        $_SESSION["sess_city"] = $result['city'];
        $_SESSION["sess_country"] = $result['country'];
        $_SESSION["sess_state"] = $result['state'];
        $_SESSION["sess_rating"] = $result['rating'];
        $_SESSION["sess_votes"] = $result['votes'];
        $_SESSION["sess_withpicture"] = $result['withpicture'];
        $_SESSION["sess_withvideo"] = $result['withvideo'];

        $db->query("UPDATE `tblUsers` SET `firsttime` = 'Y', `lastip` = '" . $_SERVER['REMOTE_ADDR'] . "', `lastlogin` = NOW() WHERE `id` = '" . $_SESSION['sess_id'] . "'");

        $db->query("INSERT INTO tblloginlog (user_id ,date) VALUES('{$result['id']}', NOW())");

        if ($_SESSION['sess_accesslevel'] < 0) {
            header_location($cfg['path']['url_upgrade'] . 'indexlogin.php?id=' . $_SESSION['sess_id']);
        } else {
            header_location();
        }
    } elseif ($result = $db->get_row($sql_login)) {
        header_location($cfg['path']['url_site'] . 'index.php?error=' . urlencode("Your account has been disabled. Please contact support."));
    }
}
include ("./includes/" . "require" . "/" . "site_foot.php");

header_location($cfg['path']['url_site'] . 'index.php?error=' . urlencode("Login / Password error, please try again."));
?>