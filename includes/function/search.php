<?
/* $Id: search.php 467 2008-06-04 22:13:25Z bogdan $ */

function search_results($db, $search_options)
{
    $sql_search = "SELECT u.* FROM tblUsers u WHERE u.hide = 'N' AND u.disabled = 'N' ";
//    $sql_search2 = "SELECT u.* FROM tblUsers u WHERE u.hide = 'N' AND u.disabled = 'N' ";

    if (isset($search_options['tag']) AND trim($search_options['tag']) != '') {
    	$sql_search = "SELECT DISTINCT u.* FROM tblUsers u INNER JOIN tblUserTags ut ON (u.id = ut.user_id) LEFT JOIN tblPhotos p ON (u.id = p.user_id) WHERE ut.value = '{$search_options[tag]}'";
    	if(isset($search_options['sex']))
    	{
    		$sql_search .= " AND `sex` = '" . $db->escape($search_options['sex']) . "' ";
    	}
		if (isset($search_options['online'])) {
    		$sql_search .= " AND `lastlogin` > '" . (date("Y-m-d H:i:s", time() - (10 * 60))) . "'";
    	}
		return $sql_search;
    }
    if (isset($search_options['screenname']) AND trim($search_options['screenname']) != '')
    {
    	$where .= " AND `screenname` = '" . $db->escape($search_options['screenname']) . "' ";
    	
    	if (isset($search_options['online'])) {
    		$where .= " AND `lastlogin` > '" . (date("Y-m-d H:i:s", time() - (10 * 60))) . "' ";
    	}
    	
    	if($_SERVER['REMOTE_ADDR'] == "92.80.132.203"){
    		echo "Now: ", date("Y-m-d H:i:s", strtotime("now")), "<br/>";
			echo "10 min: ", date("Y-m-d H:i:s", strtotime("-10 minutes")), "<br/>";
			echo $sql_search . " " . $where;
		}
		
    	return $sql_search . " " . $where;
    }

    if(isset($search_options['memberid']) AND (int) $search_options['memberid'] > 0)
    {
    	$where .= " AND `id` = '" . (int) $search_options['memberid'] . "' ";
    }


    if(isset($search_options['searchtype']) AND trim($search_options['searchtype']) == 'guest')
    {
    	if(!$where) {
    		$where = " AND `id` < '0' ";
    	}

    	return $sql_search . " " . $where;
    }


    if(isset($search_options['sex']))
    {
    	$where .= " AND `sex` = '" . $db->escape($search_options['sex']) . "' ";
    }

    if(isset($search_options['online']))
    {
    	$where .= " AND `lastlogin` > '" . (date("Y-m-d H:i:s", time() - 10 * 60)) . "' ";
    }


    if(isset($search_options['looking']))
    {
	    $where .= " AND (`looking` & (1 << " . $db->escape($search_options['looking']) . ")) ";
    }


    if(isset($search_options['for'])){
	    foreach($search_options['for'] as $param)
	    {
	    	if(empty($for)){
	    		$for =  " AND (`for` & (1 << " . $db->escape($param) . ") ";
	    	} else {
	    		$for .= " OR `for` & (1 << " . $db->escape($param) . ") ";
	    	}
	     }

	     $where .= $for . ") ";
    }

    if(isset($search_options['bodytype']) AND intval($search_options['bodytype']) > 0)
    {
    	$where .= " AND `bodytype` = '" . $db->escape($search_options['bodytype']) . "' ";
    }
    if(intval($search_options['sex']) > 1 AND isset($search_options['p_bodytype']) AND intval($search_options['p_bodytype']) > 0)
    {
    	$where .= " AND `p_bodytype` = '" . $db->escape($search_options['p_bodytype']) . "' ";
    }


    if(isset($search_options['height']) AND intval($search_options['height']) > 0)
    {
    	$where .= " AND `height` = '" . $db->escape($search_options['height']) . "' ";
    }
    if(intval($search_options['sex']) > 1 AND isset($search_options['p_height']) AND intval($search_options['p_height']) > 0)
    {
    	$where .= " AND `p_height` = '" . $db->escape($search_options['p_height']) . "' ";
    }


    if(isset($search_options['weight']) AND intval($search_options['weight']) > 0)
    {
    	$where .= " AND `weight` = '" . $db->escape($search_options['weight']) . "' ";
    }
    if(intval($search_options['sex']) > 1 AND isset($search_options['p_weight']) AND intval($search_options['p_weight']) > 0)
    {
    	$where .= " AND `p_weight` = '" . $db->escape($search_options['p_weight']) . "' ";
    }


    if(isset($search_options['haircolor']) AND intval($search_options['haircolor']) > 0)
    {
    	$where .= " AND `haircolor` = '" . $db->escape($search_options['haircolor']) . "' ";
    }
    if(intval($search_options['sex']) > 1 AND isset($search_options['p_haircolor']) AND intval($search_options['p_haircolor']) > 0)
    {
    	$where .= " AND `p_haircolor` = '" . $db->escape($search_options['p_haircolor']) . "' ";
    }


    if(isset($search_options['eyecolor']) AND intval($search_options['eyecolor']) > 0)
    {
    	$where .= " AND `eyecolor` = '" . $db->escape($search_options['eyecolor']) . "' ";
    }
    if(intval($search_options['sex']) > 1 AND isset($search_options['p_eyecolor']) AND intval($search_options['p_eyecolor']) > 0)
    {
    	$where .= " AND `p_eyecolor` = '" . $db->escape($search_options['p_eyecolor']) . "' ";
    }


    if(isset($search_options['ethnicity']) AND intval($search_options['ethnicity']) > 0)
    {
    	$where .= " AND `ethnicity` = '" . $db->escape($search_options['ethnicity']) . "' ";
    }
    if(intval($search_options['sex']) > 1 AND isset($search_options['p_ethnicity']) AND intval($search_options['p_ethnicity']) > 0)
    {
    	$where .= " AND `p_ethnicity` = '" . $db->escape($search_options['p_ethnicity']) . "' ";
    }


    if(isset($search_options['smoking']) AND intval($search_options['smoking']) > 0)
    {
    	$where .= " AND `smoking` = '" . $db->escape($search_options['smoking']) . "' ";
    }
    if(intval($search_options['sex']) > 1 AND isset($search_options['p_smoking']) AND intval($search_options['p_smoking']) > 0)
    {
    	$where .= " AND `p_smoking` = '" . $db->escape($search_options['p_smoking']) . "' ";
    }


    if(isset($search_options['drinking']) AND intval($search_options['drinking']) > 0)
    {
    	$where .= " AND `drinking` = '" . $db->escape($search_options['drinking']) . "' ";
    }
    if(intval($search_options['sex']) > 1 AND isset($search_options['p_drinking']) AND intval($search_options['p_drinking']) > 0)
    {
    	$where .= " AND `p_drinking` = '" . $db->escape($search_options['p_drinking']) . "' ";
    }


    if(isset($search_options['sexualactivities'])){
	    foreach($search_options['sexualactivities'] as $param)
	    {
	    	if(empty($sexualactivities)){
	    		$sexualactivities =  " AND (`sexualactivities` & (1 << " . $db->escape($param) . ") ";
	    	} else {
	    		$sexualactivities .= " OR `sexualactivities` & (1 << " . $db->escape($param) . ") ";
	    	}
	     }

	     $where .= $sexualactivities . ") ";
    }


    if(isset($search_options['age_from']))
    {
    	$where .= " AND `birthdate` <= '" . $db->escape(birthday($search_options['age_from'])) . "' ";
    }
    if(isset($search_options['age_to']))
    {
    	$where .= " AND `birthdate` >= '" . $db->escape(birthday($search_options['age_to'])) . "' ";
    }
    if(intval($search_options['sex']) > 1 AND isset($search_options['p_age_from']))
    {
    	$where .= " AND `p_birthdate` <= '" . $db->escape(birthday($search_options['p_age_from'])) . "' ";
    }
    if(intval($search_options['sex']) > 1 AND isset($search_options['p_age_to']))
    {
    	$where .= " AND `p_birthdate` >= '" . $db->escape(birthday($search_options['p_age_to'])) . "' ";
    }


    if(isset($search_options['country']) AND $search_options['country'] > 0)
    {
	    $where .= " AND ((`country` = '" . $db->escape($search_options['country']) . "' ";
	    $double_close = true;
	    if(isset($search_options['state']) AND $search_options['state'] > 0 AND $search_options['country'] == '1')
	    {
		    $where .= " AND `state` = '" . $db->escape($search_options['state']) . "' ";
	    }


	    if(isset($search_options['city']) AND trim($search_options['city']) != '')
	    {
		    $double_close = false;
		    $where .= " AND `city` = '" . addslashes($search_options['city']) . "') ";
	    }

	    if( trim($search_options['city']) == $_SESSION['sess_city'] AND $search_options['country'] == $_SESSION['sess_country'] AND ($search_options['state'] == 0 OR $search_options['state'] == $_SESSION['sess_state']) )
	    {
	    	//$where .= " OR `typeloc` = 'Y') ";
	    	$where .= typeloc($search_options, 'Y');
	    }
	    else
	    {
	    	//$where .= " AND `typeloc` = 'N') ";
	    	$where .= typeloc($search_options, 'N');
	    }
	    $where .= ($double_close) ? ')) ' : ') ';
    } else {
		if(isset($search_options['city']) AND trim($search_options['city']) != '')
	    {
		    $where .= " AND `city` = '" . addslashes($search_options['city']) . "'";
	    }
    }

    if(isset($search_options['withpicture'])){
    	$where .= " AND `withpicture` = 'Y' ";
    }


    if(isset($search_options['withvideo'])){
    	$where .= " AND `withvideo` = 'Y' ";
    }

	if($_SERVER['REMOTE_ADDR'] == "92.80.132.203"){
		echo $sql_search . " " . $where;
	}

//if ($where == "")  syslog(LOG_INFO, var_export( $sql_search,true));
    return $sql_search . " " . $where;
}

function orderby($sex = 0, $looking = 1)
{
	if($sex == 0 AND $looking >= 1)
	{
		$orderby = "`withpicture` DESC, `typeusr` DESC";
	}
	elseif($sex == 1 AND ($looking == 0 OR $looking >= 2))
	{
		$orderby = "`accesslevel` DESC";
	}
	else
	{
		$orderby = "`typeusr` DESC, `accesslevel` DESC";
	}

	return $orderby;
}

function typeloc($search_options, $equal = 'Y')
{
	if($search_options['country'] != 1) $search_options['state'] = 0;

	$s_type = mysql_query("SELECT `fromdate`, `todate`
	           			   FROM   `tblLocations`
	           			   WHERE  `user_id` = '" . $_SESSION['sess_id'] . "' AND
	                 			  `country` = '" . (int) $search_options['country'] . "' AND
	                 			  `state`   = '" . (int) $search_options['state'] . "'   AND
	                 			  `city`    = '" . addslashes($search_options['city']) . "'
	                 	 ");

	while ($obj_type = mysql_fetch_object($s_type)) {
		$where2 .= "(`joined` >= '" . $obj_type->fromdate . "' AND `joined` < '" . $obj_type->todate . "') OR ";
	}

	$where2 = substr($where2, 0, -3);

	if($equal == 'Y'){
		list($max) = mysql_fetch_array(mysql_query("SELECT `todate`
		                                            FROM `tblLocations`
		                                            WHERE `user_id` = '". $_SESSION['sess_id'] ."'
		                                            ORDER BY `id` DESC
		                                            LIMIT 1"));

		$max = strlen($max)>0?$max:'0000-00-00 00:00:00';

		if(strlen($where2) > 0){
			$where = " OR (`typeloc` = 'Y' AND (`joined` >= '" . $max . "' OR " . $where2 . "))";
		}else{
			$where = " OR (`typeloc` = 'Y' AND `joined` >= '" . $max . "')";
		}
	}
	else{
		if(strlen($where2) > 0){
			$where = " OR (`typeloc` = 'Y' AND (" . $where2 . "))";
		}else{
			$where = " AND `typeloc` = 'N'";
		}
	}

	return $where;
}
?>
