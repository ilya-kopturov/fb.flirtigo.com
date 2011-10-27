<?php
/* $Id: ajax_profile_edit.php 457 2008-06-04 16:19:29Z bogdan $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

/* ... form submit ... */
if (strcmp($_GET['u'], 't') == 0) {
	$profile = $_POST;
	if(isset($profile['looking'])) {
		$looking_arr = array();
		$looking_arr = $profile['looking'];

		$looking = 0;
		foreach ($looking_arr as $param) {
			$looking |= (1 << $param);
		}
	}
	
	if($looking == 0){
		$error = "Please select who you are seeking.";
		print <<< EOF
$('#error_alert table').removeClass('error');
$('#error_alert table').addClass('success');
$('#error_alert div.errorTextBig').html('$error');
$('#error_alert').fadeIn('slow');
$('#profile > ul').tabs('load', 1);
window.scrollTo(0, 0);
EOF;
	exit;
	}

	if(isset($profile['for'])) {
		$for_arr = array();
		$for_arr = $profile['for'];

		$for = 0;
		foreach ($for_arr as $param) {
			$for |= (1 << $param);
		}
	}
	
	if($for == 0){
		$error = "Please Select what you are looking for.";
	print <<< EOF
$('#error_alert table').removeClass('error');
$('#error_alert table').addClass('success');
$('#error_alert div.errorTextBig').html('$error');
$('#error_alert').fadeIn('slow');
$('#profile > ul').tabs('load', 1);
window.scrollTo(0, 0);
EOF;
	exit;
	}

	if(isset($profile['sexualactivities'])) {
		$sexualactivities_arr = array();
		$sexualactivities_arr = $profile['sexualactivities'];

		$sexualactivities = 0;
		foreach ($sexualactivities_arr as $param) {
			$sexualactivities |= (1 << $param);
		}
	}

	$profile['birthdate'] = $profile['year'] . "-" . $profile['month'] . "-" . $profile['day'];
	$profile['p_birthdate'] = $profile['p_year'] . "-" . $profile['p_month'] . "-" . $profile['p_day'];

	if($_SESSION['sess_typeusr'] == 'N'){
	@mysql_query("UPDATE `tblUsers` SET `birthdate`   = '" . $profile['birthdate'] .         "',
	                                    `bodytype`    = '" . (int) $profile['bodytype'] .    "',
	                                    `height`      = '" . (int) $profile['height'] .      "',
	                                    `weight`      = '" . (int) $profile['weight'] .      "',
	                                    `haircolor`   = '" . (int) $profile['haircolor'] .   "',
	                                    `eyecolor`    = '" . (int) $profile['eyecolor'] .    "',
	                                    `ethnicity`   = '" . (int) $profile['ethnicity'] .   "',
	                                    `drinking`    = '" . (int) $profile['drinking'] .    "',
	                                    `smoking`     = '" . (int) $profile['smoking'] .     "',
										`p_birthdate`   = '" . $profile['p_birthdate'] .         "',
	                                    `p_bodytype`    = '" . (int) $profile['p_bodytype'] .    "',
	                                    `p_height`      = '" . (int) $profile['p_height'] .      "',
	                                    `p_weight`      = '" . (int) $profile['p_weight'] .      "',
	                                    `p_haircolor`   = '" . (int) $profile['p_haircolor'] .   "',
	                                    `p_eyecolor`    = '" . (int) $profile['p_eyecolor'] .    "',
	                                    `p_ethnicity`   = '" . (int) $profile['p_ethnicity'] .   "',
	                                    `p_drinking`    = '" . (int) $profile['p_drinking'] .    "',
	                                    `p_smoking`     = '" . (int) $profile['p_smoking'] .     "',
										`looking` = '" . (int) $looking . "',
										`city` = '" . $profile['city'] . "',
										`state` = '" . (int) $profile['state'] . "',
										`country` = '" . (int) $profile['country'] . "',
    	                                `for` = '" . (int) $for . "',
                    	                `sexualactivities` = '" . (int) $sexualactivities . "',
                        	            `approved` = 'N'
                            	  WHERE `id` = '" . $_SESSION['sess_id'] . "'
                                  LIMIT 1");
	
		@mysql_query("DELETE FROM `tblUpdateProfile` WHERE `user_id` = '" . $_SESSION['sess_id'] ."'");
		
		@mysql_query("INSERT INTO `tblUpdateProfile` (`user_id`,
	    	                                          `introtitle`,
	        	                                      `introtext`,
	            	                                  `describe`
	                	                              )
	                    	                           VALUES 
	                        	                      ('" . $_SESSION['sess_id'] . "',
	                            	                   '" . addslashes($profile['introtitle']) . "',
	                                	               '" . addslashes($profile['introtext']) . "',
	                                    	           '" . addslashes($profile['describe']) . "'
	                                        	      )");
	}else{
	@mysql_query("UPDATE `tblUsers` SET `birthdate`   = '" . $profile['birthdate'] .         "',
	                                    `bodytype`    = '" . (int) $profile['bodytype'] .    "',
	                                    `height`      = '" . (int) $profile['height'] .      "',
	                                    `weight`      = '" . (int) $profile['weight'] .      "',
	                                    `haircolor`   = '" . (int) $profile['haircolor'] .   "',
	                                    `eyecolor`    = '" . (int) $profile['eyecolor'] .    "',
	                                    `ethnicity`   = '" . (int) $profile['ethnicity'] .   "',
	                                    `drinking`    = '" . (int) $profile['drinking'] .    "',
	                                    `smoking`     = '" . (int) $profile['smoking'] .     "',
										`p_birthdate`   = '" . $profile['p_birthdate'] .         "',
	                                    `p_bodytype`    = '" . (int) $profile['p_bodytype'] .    "',
	                                    `p_height`      = '" . (int) $profile['p_height'] .      "',
	                                    `p_weight`      = '" . (int) $profile['p_weight'] .      "',
	                                    `p_haircolor`   = '" . (int) $profile['p_haircolor'] .   "',
	                                    `p_eyecolor`    = '" . (int) $profile['p_eyecolor'] .    "',
	                                    `p_ethnicity`   = '" . (int) $profile['p_ethnicity'] .   "',
	                                    `p_drinking`    = '" . (int) $profile['p_drinking'] .    "',
	                                    `p_smoking`     = '" . (int) $profile['p_smoking'] .     "',
										`looking` = '" . (int) $looking . "',
										`city` = '" . $profile['city'] . "',
										`state` = '" . (int) $profile['state'] . "',
										`country` = '" . (int) $profile['country'] . "',
    	                                `for` = '" . (int) $for . "',
        	                            `introtitle` = '" . addslashes($profile['introtitle']) . "',
            	                        `introtext` = '" . addslashes($profile['introtext']) . "',
                	                    `describe` = '" . addslashes($profile['describe']) . "',
                    	                `sexualactivities` = '" . (int) $sexualactivities . "'
                            	  WHERE `id` = '" . $_SESSION['sess_id'] . "'
                                  LIMIT 1");
	}

	if(@mysql_affected_rows() > 0) {
		$error = 0;
	} elseif($error = mysql_error()) {
		$error = "Error: $error. Your profile was not updated!";
	} else {
		$error = 0;
	}
	
	if(!$error AND ( (int) $profile['country'] != (int) $_SESSION['sess_country'] OR 
	                 (int) $profile['state']   != (int) $_SESSION['sess_state']   OR
	                       $profile['city']    !=       $_SESSION['sess_city']
	               )){
		list($todate) = mysql_fetch_array(mysql_query("SELECT `todate` FROM `tblLocations`
		                                               WHERE `user_id` = '" . $_SESSION['sess_id'] . "'
		                                               ORDER BY `id` DESC LIMIT 1"));
		
		$todate = strlen($todate)>0?$todate:'0000-00-00 00:00:00';
		
		@mysql_query("INSERT INTO `tblLocations` (`user_id`,
		                                          `country`,
		                                          `state`,
		                                          `city`,
		                                          `fromdate`,
		                                          `todate`)
		                                   VALUES                     
		                                         ('" . (int) $_SESSION['sess_id'] . "',
		                                          '" . (int) $_SESSION['sess_country'] . "',
		                                          '" . (int) $_SESSION['sess_state'] . "',
		                                          '" . addslashes($_SESSION['sess_city']) . "',
		                                          '" . $todate . "',
		                                          NOW())");
		
		if(!mysql_errno()){
			$_SESSION['sess_country'] = (int) $profile['country'];
			$_SESSION['sess_state']   = (int) $profile['state'];
			$_SESSION['sess_city']    = $profile['city'];
		}
	}
	

	$msg = $error ? $error : "Your Profile has been submitted for approval!";
	print <<< EOF
$('#error_alert table').removeClass('error');
$('#error_alert table').addClass('success');
$('#error_alert div.errorTextBig').html('$msg');
$('#error_alert').fadeIn('slow');
$('#profile > ul').tabs('load', 1);
window.scrollTo(0, 0);
EOF;
	exit;
}
/* ..end form submit.. */

$uid = $_SESSION['sess_id'];
$user = $db->get_row("SELECT * FROM `tblUsers` WHERE `id` = '$uid' LIMIT 1");

$smarty->register_function('age', 'smarty_age');

$smarty->assign("user", $user);
$smarty->assign("age_array", age_array($user['birthdate']));
$smarty->assign("p_age_array", age_array($user['p_birthdate']));
$smarty->assign("looking_array", looking_array($user['looking']));
$smarty->assign("forr_array", forr_array($user['for']));
$smarty->assign("sexualactivities_array", sexualactivities_array($user['sexualactivities']));

$smarty->display("{$cfg['template']['dir_template']}ajax/profile_edit.tpl" );