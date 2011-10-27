<?
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

function age($birthday)
{
    list($year,$month,$day) = explode("-",$birthday);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($day_diff < 0 || $month_diff < 0) $year_diff--;
    return $year_diff;
}

function age_array($birthday)
{
    list($age_array[0],$age_array[1],$age_array[2]) = explode("-",$birthday);
    return $age_array;
}




function looking($looking)
{
	global $cfg;
	 
	for($param = 0; $param < count($cfg['profile']['looking']); $param++)
	{
		if($looking & (1 << $param)){
			if(empty($look)){
			    $look = $cfg['profile']['looking'][$param];
			}
			else
			{
				$look .= ", " . $cfg['profile']['looking'][$param];
			}
		}
	}
	
	return $look;
}

function looking_array($looking)
{
	global $cfg;
	 
	for($param = 0; $param < count($cfg['profile']['looking']); $param++)
	{
		if($looking & (1 << $param)){
			if(empty($look)){
			    $look = 1;
			    $look_array[$param] = 1;
			}
			else
			{
				$look_array[$param] = 1;
			}
		}
	}
	
	return $look_array;
}




function forr($forr)
{
	global $cfg;
	 
	for($param = 0; $param < count($cfg['profile']['for']); $param++)
	{
		if($forr & (1 << $param)){
			if(empty($for)){
			    $for = $cfg['profile']['for'][$param];
			}
			else
			{
				$for .= ", " . $cfg['profile']['for'][$param];
			}
		}
	}
	
	return $for;
}

function forr_array($forr)
{
	global $cfg;
	 
	for($param = 0; $param < count($cfg['profile']['for']); $param++)
	{
		if($forr & (1 << $param)){
			if(empty($for)){
			    $for = 1;
			    $for_array[$param] = 1;
			}
			else
			{
				$for_array[$param] = 1;
			}
		}
	}
	
	return $for_array;
}

function sexualactivities($sexualactivities)
{
	global $cfg;
	 
	for($param = 0; $param < count($cfg['profile']['sexualactivities']); $param++)
	{
		if($sexualactivities & (1 << $param)){
			if(empty($sexual)){
			    $sexual = $cfg['profile']['sexualactivities'][$param];
			}
			else
			{
				$sexual .= ", " . $cfg['profile']['sexualactivities'][$param];
			}
		}
	}
	
	return $sexual;
}

function sexualactivities_array($sexualactivities)
{
	global $cfg;
	 
	for($param = 0; $param < count($cfg['profile']['sexualactivities']); $param++)
	{
		if($sexualactivities & (1 << $param)){
			if(empty($sexual)){
			    $sexual = 1;
			    $sexualactivities_array[$param] = 1;
			}
			else
			{
				$sexualactivities_array[$param] = 1;
			}
		}
	}
	
	return $sexualactivities_array;
}


function birthday($age)
{
    list($year,$month,$day) = explode("-",date("Y-m-d"));
    $year_diff  = date("Y") - $age;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($day_diff < 0 || $month_diff < 0) $year_diff--;
    return $year_diff . "-" . $month . "-" . $day;
}



function edit_profile($db, $profile)
{
	global $cfg;
	
	if(isset($profile['looking']))
	{
		$looking_arr = array();
		$looking_arr = $profile['looking'];
		
		$looking = 0;
		foreach ($looking_arr as $param)
		{
			$looking |= (1 << $param);
		}
	}
	else
	{
		$error = "Please select who you are seeking.";
		return $error;
	}
	
	if(isset($profile['for']))
	{
		$for_arr = array();
		$for_arr = $profile['for'];
		
		$for = 0;
		foreach ($for_arr as $param)
		{
			$for |= (1 << $param);
		}
	}
	else
	{
		$error = "Please Select what you are looking for.";
		return $error;
	}
	
	if(isset($profile['sexualactivities']))
	{
		$sexualactivities_arr = array();
		$sexualactivities_arr = $profile['sexualactivities'];
		
		$sexualactivities = 0;
		foreach ($sexualactivities_arr as $param)
		{
			$sexualactivities |= (1 << $param);
		}
	}
	
	if(!trim($profile['introtitle'])){
		$error = "Introduction title empty.";
		return $error;
	}
	
	if(!trim($profile['introtext'])){
		$error = "Introduction text empty.";
		return $error;
	}
	
	if(!trim($profile['describe'])){
		$error = "Describe text empty.";
		return $error;
	}
	
	
	if($_SESSION['sess_typeusr'] == 'N'){
		@mysql_query("UPDATE `tblUsers` SET `looking` = '" . (int) $looking . "', 
	    	                                `for` = '" . (int) $for . "', 
	                    	                `sexualactivities` = '" . (int) $sexualactivities . "', 
	                        	            `approved` = 'N' 
	                            	  WHERE `id` = '" . $_SESSION['sess_id'] . "'
	                                  LIMIT 1");
	
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
		@mysql_query("UPDATE `tblUsers` SET `looking` = '" . (int) $looking . "', 
	    	                                `for` = '" . (int) $for . "', 
	        	                            `introtitle` = '" . addslashes($profile['introtitle']) . "', 
	            	                        `introtext` = '" . addslashes($profile['introtext']) . "', 
	                	                    `describe` = '" . addslashes($profile['describe']) . "', 
	                    	                `sexualactivities` = '" . (int) $sexualactivities . "', 
	                        	            `approved` = 'Y' 
	                            	  WHERE `id` = '" . $_SESSION['sess_id'] . "'
	                                  LIMIT 1");
	}
	
	if(@mysql_affected_rows() > 0){
		$error = 0;
	} elseif(mysql_error()) {
		$error = "Error: Your profile was not updated! Try again later.";
	} else {
		$error = 0;
	}
	return $error;
}

function edit_profiledetails($db, $profile)
{
	global $cfg;
	
    if(!checkdate($profile['month'],$profile['day'],$profile['year'])){
		$error = "Invalid Birth Date.";
		return $error;
	}
	else
	{
		$profile['birthdate'] = $profile['year'] . "-" . $profile['month'] . "-" . $profile['day'];
	}
	
    if(@checkdate($profile['p_month'],$profile['p_day'],$profile['p_year'])){
		$profile['p_birthdate'] = $profile['p_year'] . "-" . $profile['p_month'] . "-" . $profile['p_day'];
	}
	
	mysql_query("UPDATE `tblUsers` SET `birthdate`   = '" . $profile['birthdate'] .         "', 
	                                   `p_birthdate` = '" . (int) $profile['p_birthdate'] . "', 
	                                   `bodytype`    = '" . (int) $profile['bodytype'] .    "', 
	                                   `p_bodytype`  = '" . (int) $profile['p_bodytype'] .  "', 
	                                   `height`      = '" . (int) $profile['height'] .      "', 
	                                   `p_height`    = '" . (int) $profile['p_height'] .    "', 
	                                   `weight`      = '" . (int) $profile['weight'] .      "', 
	                                   `p_weight`    = '" . (int) $profile['p_weight'] .    "', 
	                                   `haircolor`   = '" . (int) $profile['haircolor'] .   "', 
	                                   `p_haircolor` = '" . (int) $profile['p_haircolor'] . "', 
	                                   `eyecolor`    = '" . (int) $profile['eyecolor'] .    "', 
	                                   `p_eyecolor`  = '" . (int) $profile['p_eyecolor'] .  "', 
	                                   `ethnicity`   = '" . (int) $profile['ethnicity'] .   "', 
	                                   `p_ethnicity` = '" . (int) $profile['p_ethnicity'] . "', 
	                                   `drinking`    = '" . (int) $profile['drinking'] .    "', 
	                                   `p_drinking`  = '" . (int) $profile['p_drinking'] .  "', 
	                                   `smoking`     = '" . (int) $profile['smoking'] .     "', 
	                                   `p_smoking`   = '" . (int) $profile['p_smoking'] .   "'  
	                             WHERE `id`          = '" . (int) $_SESSION['sess_id'] .    "'  
	                             LIMIT 1");
	
	if(@mysql_affected_rows() > 0){
		$error = 0;
	} elseif(mysql_error()) {
		$error = "Error: Your profile was not updated! Try again later.";
		return $error;
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
	
	return $error;
}
?>