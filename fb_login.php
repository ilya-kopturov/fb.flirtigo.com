<?php

define("IN_MAINSITE", TRUE);

include ($cfg['path']['dir_include'] . "require" . "/" . "site_head.php");

/* search FB login in DB */
if (!$fb_user_id) {
    // here user Not logged in via FB. redirect to home
    header("Location: " . $cfg['path']['url_site']);
}

// get FB data
$fb_data = @$db->query("
	SELECT 
		fb_id
	FROM tblFBData
	WHERE fb_id = '" . $fb_user_id . "';
");
if ($fb_data) {
    $row = $fb_data->fetchRow();
}
if (is_array($row)) {
    // user come from home page -> FB login page -> fb_login.php -> this page (Not 1-st Time!!!)
    // set Session data
    $sql_login = "
		SELECT `tu`.`id`, `tu`.`screenname`, `tu`.`pass`, `tu`.`sex`, `tu`.`typeusr`, `tu`.`looking`, `tu`.`rating`, `tu`.`votes`, `tu`.`city`, 
			`tu`.`country`, `tu`.`state`, `tu`.`accesslevel`, `tu`.`withpicture`, `tu`.`withvideo`
		FROM `tblUsers` AS `tu`
		INNER JOIN `tblFBData` AS `tfd` ON `tfd`.`user_id` = `tu`.`id`
		WHERE `tfd`.`fb_id` = '$fb_user_id'
	";
    $sql_login .= " AND `disabled` = 'N'";
    if ($result = $db->get_row($sql_login)) {
        // check screenname and pass
        $check_username = $result['screenname'];
        $check_password = $result['pass'];
        if ($check_username == null) {
            $check_username = '';
        }
        if ($check_password == null) {
            $check_password = '';
        }
        if (($check_username == '') OR ($check_password == '')) { // here user logged in via FB but not complete join (not have screenname and pass)
            header("Location: " . $cfg['path']['url_site'] . 'join.php');
        }
        $_SESSION['login_type'] = 2; // 2 - FB flag
        $_SESSION["sess_id"] = $result['id'];
        //$_SESSION["sess_screenname"] = $result['screenname'];
        //$_SESSION["sess_pass"] = $result['pass'];
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
        //header_location($cfg['path']['url_site'] . 'index.php?error=' . urlencode("Your account has been disabled. Please contact support."));
    }
        //header("Location: " . $cfg['path']['url_site'] . 'login.php');
        // TODO: save log if needed
} else {
    // this FB id is exist - this is first time log in. Add record to db
    $name = $fb_me['name'];
    $first_name = $fb_me['first_name'];
    $last_name = $fb_me['last_name'];
    $link = $fb_me['link'];
    $username = $fb_me['username'];
    $birthday = $fb_me['birthday'];
    $birthday = explode('/', $fb_me['birthday']);
    $birthday = $birthday[2] . '-' . $birthday[0] . '-' . $birthday[1];
    $location = $fb_me['location']['name'];
    $gender = $fb_me['gender'];
    if ($gender == 'male') {
        $sex = 0;
    } else {
        $sex = 1;
    }
    $email = $fb_me['email'];
    $timezone = $fb_me['timezone'];
    $locale = $fb_me['locale'];
    $verified = $fb_me['verified'];
    $updated_time = $fb_me['updated_time'];
    $time_now = date("Y-m-d H:i:s ", time());
    // Create new user
    $sql = "
		INSERT INTO tblUsers(screenname, pass, gallery_pass, email, cell, sex, looking, `for`, rating, votes, introtext, introtitle, `describe`, bodytype, p_bodytype, height, p_height, weight, p_weight, haircolor, p_haircolor, eyecolor, p_eyecolor, ethnicity, p_ethnicity, smoking, p_smoking, drinking, p_drinking, sexualactivities, fantasies, birthdate, p_birthdate, country, `state`, city, zip, hide, withpicture, withvideo, emailstatus, emailnotif, whispernotif, newsletternotif, mailreceived, mailresponded, mailopened, typeusr, typeloc, redirect, mostwanted, approved, approvedby, approveddate, firsttime, disabled, accesslevel, featured, linked, joined, lastlogin, typelogin, lastip, upgraded, downgrade_after, origin, orgaccesslevel, orgolduserid, promcode) 
		VALUES('', '', '', '$email', '', $sex, 0, 0, 0, 0, '', '', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '$birthday', '0000-00-00', 0, 0, '', '', 'N', 'N', 'N', 'G', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'Y', 'N', 0, '0000-00-00', 'N', 'N', '0', 'N', 0, '$time_now', '$time_now', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', '');
	";
    // get user id
    $res = @$db->query($sql);
    $id = $db->lastInsertID('tblUsers', 'id');
    // Add Facebook data
    $res = @$db->query("
		INSERT INTO tblFBData(fb_id, user_id, user_name, first_name, last_name, username, date_of_birth, email, gender, link, location, timezone, verified, locale, created_time, last_update_date)
		VALUES('$fb_user_id', $id, '$name', '$first_name', '$last_name', '$username', '$birthday', '$email', '$gender', '$link', '$location', $timezone, $verified, '$locale', '$time_now', '$updated_time');
	");
    // Redirect to join page
    header("Location: " . $cfg['path']['url_site'] . 'join.php');
}