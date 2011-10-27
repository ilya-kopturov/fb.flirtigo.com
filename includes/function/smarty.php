<?php
/**
 * DIRTYFLIRTING.COM
 *
 * $Id: smarty.php 528 2008-06-12 15:27:14Z bogdan $
 */

function smarty_rnd_md5($params = null, &$smarty = null) {
	return md5(SECRET . microtime() . SECRET);
}

function smarty_age($params, &$smarty = null)
{
    list($year,$month,$day) = explode("-",$params['birthday']);
    $year_diff  = (int) date("Y") - (int) $year;
    $month_diff = (int) date("m") - (int) $month;
    $day_diff   = (int) date("d") - (int) $day;
    if (($day_diff < 0 && $month_diff <= 0) || $month_diff < 0) $year_diff--;
    if($year_diff > 100){
    	return 'Ask Me';
    }
    return $year_diff;
}

function smarty_looking($params, &$smarty = null)
{
	global $cfg;

	for($param = 0; $param < count($cfg['profile']['looking']); $param++)
	{
		if($params['looking'] & (1 << $param)){
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

function smarty_forr($params, &$smarty = null)
{
	global $cfg;

	for($param = 0; $param < count($cfg['profile']['for']); $param++)
	{
		if($params['forr'] & (1 << $param)){
			if(empty($for)){
			    $for = $cfg['profile']['for'][$param];
			}
			else
			{
				$for .= ", " . $cfg['profile']['for'][$param];
			}
		}
	}

	return $for!=''?$for:'Ask Me';
}

function smarty_sexualactivities($params, &$smarty = null)
{
	global $cfg;

	for($param = 0; $param < count($cfg['profile']['sexualactivities']); $param++)
	{
		if($params['sexualactivities'] & (1 << $param)){
			if(empty($sexual)){
			    $sexual = $cfg['profile']['sexualactivities'][$param];
			}
			else
			{
				$sexual .= ", " . $cfg['profile']['sexualactivities'][$param];
			}
		}
	}

	return $sexual!=''?$sexual:'Ask Me';
}

function smarty_location($params, &$smarty = null)
{
	global $db, $cfg;

	$countries = $cfg['countries'];
	$states    = $cfg['states'];

	$typelocation = typelocloc($params['joined']);

	if($params['type'] == 'short'){
		if($params['typeloc'] == 'Y'){
			return ucwords($typelocation['sess_city']) . ", " . ucwords($countries[$typelocation['sess_country']]);
		}
		else{
			return ucwords($params['city']) . ", " . ucwords($countries[$params['country']]);
		}
	}
	elseif($params['type'] == 'country'){
		if($params['typeloc'] == 'Y'){
			if($params['ret'] == 'id'){
				return $typelocation['sess_country'];
			}
			return ucwords($countries[$typelocation['sess_country']]);
		}
		else{
			if($params['ret'] == 'id'){
				return $params['country'];
			}
			return ucwords($countries[$params['country']]);
		}
	}
	elseif($params['type'] == 'city'){
		if($params['typeloc'] == 'Y'){
			return ucwords($typelocation['sess_city']);
		}
		else{
			return ucwords($params['city']);
		}
	}
	else
	{
		if($params['typeloc'] == 'Y'){
			if($states[$typelocation['sess_state']])
			{
				return $typelocation['sess_city'] . ", " . $states[$typelocation['sess_state']] . ", " . $countries[$typelocation['sess_country']];
			}else{
				return $typelocation['sess_city'] . ", " . $countries[$typelocation['sess_country']];
			}
		}
		else{
			if($states[$params['state']]){
				return $params['city'] . ", " . $states[$params['state']] . ", " . $countries[$params['country']];
			}else{
				return $params['city'] . ", " . $countries[$params['country']];
			}
		}
	}
}


function typelocloc($joined){
		global $db;
		list($ret['sess_country'],
		     $ret['sess_state'],
		     $ret['sess_city']) = @mysql_fetch_array
		     					(
		                           mysql_query("SELECT `country`,`state`,`city`
		                    				    FROM `tblLocations`
		                                        WHERE  `user_id`   = '".$_SESSION['sess_id']."' AND
		                                               `fromdate` <= '".$joined."'              AND
		                                               `todate`   > '".$joined."'
		                                        LIMIT 1"
		                                      )
		                         );

		if(!$ret['sess_country']) $ret['sess_country'] = $_SESSION['sess_country'];
		if(!$ret['sess_state'])   $ret['sess_state']   = $_SESSION['sess_state'];
		if(!$ret['sess_city'])    $ret['sess_city']    = $_SESSION['sess_city'];

		if($ret['sess_country'] != 1) $ret['sess_state'] = 0;

	return $ret;
}

function smarty_adddelete($params, &$smarty = null)
{
	global $db, $cfg;

	$hb = $db->get_var("SELECT `type`
	                    FROM `tblHotBlockList`
	                    WHERE `user_id` = '" . $params['user_id'] . "' AND `friend_user_id` = '" . $params['friend_user_id'] . "'
	                    LIMIT 1");

	if($hb == 'H'){
		$ret = "<a href=\"" . $cfg['path']['url_site'] . "mem_adddelete.php?id=" . $params['friend_user_id'] ."&type=hot&action=delete\" class=\"join_text\"><b><u>Delete User</u></b></a>";
	} elseif($hb == 'B') {
		$ret = "<a href=\"" . $cfg['path']['url_site'] . "mem_adddelete.php?id=" . $params['friend_user_id'] ."&type=block&action=delete\" class=\"join_text\"><b><u>Unblock User</u></b></a>";
	} else {
		$ret = "<a href=\"" . $cfg['path']['url_site'] . "mem_adddelete.php?id=" . $params['friend_user_id'] ."&type=hot&action=add\" class=\"join_text\"><b><u>Add to Hot List</u></b></a>";
	}

	return $ret;
}

function smarty_adddelfavplugin($params, &$smarty = null)
{
	global $db, $cfg;

	$hb = $db->get_var("SELECT `plugin_id`
	                    FROM `tblFavoritePlugins`
	                    WHERE `user_id` = '" . $params['user_id'] . "' AND `plugin_id` = '" . $params['plugin_id'] . "'
	                    LIMIT 1");

	if((int) $hb > 0){
		$ret = "<a href=\"" . $cfg['path']['url_site'] . "mem_favplugins.php?plugin_id=" . $params['plugin_id'] . "&action=del\" class=\"join_text\"><u>Delete from Favorite Sites</u></a>";
	} else {
		$ret = "<a href=\"" . $cfg['path']['url_site'] . "mem_favplugins.php?plugin_id=" . $params['plugin_id'] . "&action=add\" class=\"join_text\"><u>Add to Favorite Sites</u></a>";
	}

	return $ret;
}

function smarty_addblock($params, &$smarty = null)
{
	global $db, $cfg;

	$hb = $db->get_var("SELECT `type`
	                    FROM `tblHotBlockList`
	                    WHERE `user_id` = '" . $params['user_id'] . "' AND `friend_user_id` = '" . $params['friend_user_id'] . "'
	                    LIMIT 1");

	if($hb == 'H'){
		$ret = "<span class=\"featuredBoxLink\">[ <a href=\"" . $cfg['path']['url_site'] . "mem_adddelete.php?id=" . $params['friend_user_id'] ."&type=hot&action=delete\" class=\"featuredBoxLink\">Delete User from Hot List</a> ] <br /> [ <a href=\"" . $cfg['path']['url_site'] . "mem_adddelete.php?id=" . $params['friend_user_id'] ."&type=block&action=add\" class=\"featuredBoxLink\">Block User</a> ] <br /> [ <a href=\"#\" class=\"join_text\">Report as Spam</a> ]</span>";
	} elseif($hb == 'B') {
		$ret = "<span class=\"featuredBoxLink\">[ <a href=\"" . $cfg['path']['url_site'] . "mem_adddelete.php?id=" . $params['friend_user_id'] ."&type=hot&action=add\" class=\"join_text\"><u>Add User to Hot List</u></a> ] <br /> [ <a href=\"" . $cfg['path']['url_site'] . "mem_adddelete.php?id=" . $params['friend_user_id'] ."&type=block&action=delete\" class=\"join_text\">Unblock User</a> ] <br /> [ <a href=\"#\" class=\"join_text\">Report as Spam</a> ]</span>";
	} else {
		$ret = "<span class=\"featuredBoxLink\">[ <a href=\"" . $cfg['path']['url_site'] . "mem_adddelete.php?id=" . $params['friend_user_id'] ."&type=hot&action=add\" class=\"join_text\">Add User to Hot List</a> ] <br /> [ <a href=\"" . $cfg['path']['url_site'] . "mem_adddelete.php?id=" . $params['friend_user_id'] ."&type=block&action=add\" class=\"join_text\">Block User</a> ] <br /> [ <a href=\"#\" class=\"join_text\">Report as Spam</a> ]</span>";
	}

	return $ret;
}


function smarty_online($params, &$smarty = null)
{
	global $db, $cfg;

	$online = $db->get_var("SELECT `id` FROM `tblUsers`
	                                    WHERE `id` = '" . $params['user_id'] . "' AND
	                                          (`lastlogin` > '" . (date("Y-m-d H:i:s", time() - $cfg['option']['online_time'] * 60)) .     "' OR
	                                           `typelogin` > '" . (date("Y-m-d H:i:s", time() - $cfg['option']['online_time'] * 60 * 6)) . "'  )
	                                    LIMIT 1");

	if($online || $params['user_id'] == $_SESSION['sess_id'])
		return "<span style=\"display: inline;\"><img src=\"" . $cfg['template']['url_template'] . "public/images/online.gif\" alt=\"Online\"> online now</span>";
	else
		return "<span style=\"display: inline;\"><img src=\"" . $cfg['template']['url_template'] . "public/images/offline.gif\" alt=\"Offline\"> offline</span>";
}


function smarty_rating($params, &$smarty = null)
{
	global $cfg;

	if(isset($_SESSION['sess_id']) AND $_SESSION['sess_id'] != $params['id']){
		$rate_link = $cfg['path']['url_site'] . "mem_rateprofile.php?1=1";
	}else{
		$rate_link = $cfg['path']['url_site'] . substr($_SERVER['PHP_SELF'],1) . "?error=" . "You need to login first to be able to rate";
	}

	for($i=1; $i<=5; $i++)
	{
		if($params['rating'] >= $i)
		{
			if($_SESSION['sess_id'] != $params['id']){
				$ret .= "<a href=" . $rate_link . "&id=". $params['id'] ."&f=". $i ."><img src=\"" . $cfg['template']['url_template'] . "public/images/redstar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\"></a>&nbsp;";
			}else{
				$ret .= "<img src=\"" . $cfg['template']['url_template'] . "public/images/redstar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\">&nbsp;";
			}
		} else {
			if($_SESSION['sess_id'] != $params['id']){
				$ret .= "<a href=" . $rate_link . "&id=". $params['id'] ."&f=". $i ."><img src=\"" . $cfg['template']['url_template'] . "public/images/graystar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\"></a>&nbsp;";
			}else{
				$ret .= "<img src=\"" . $cfg['template']['url_template'] . "public/images/graystar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\">&nbsp;";
			}
		}
	}

	return $ret;
}

function smarty_rateme($params, &$smarty = null)
{
	global $cfg;

	if(isset($_SESSION['sess_id']) AND $_SESSION['sess_id'] != $params['id']){
		$rate_link = $cfg['path']['url_site'] . "mem_rateprofile.php?1=1";
	}else{
		$rate_link = $cfg['path']['url_site'] . "index.php" . "?error=" . urlencode("You need to login first to be able to rate");
	}

	for($i=1; $i<=5; $i++)
	{
		if($params['rating'] >= $i)
		{
			if($_SESSION['sess_id'] != $params['id']){
				$ret .= "<a href=" . $rate_link . "&id=". $params['id'] ."&f=". $i ."><img src=\"" . $cfg['template']['url_template'] . "public/images/redstar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\"></a>&nbsp;";
			}else{
				$ret .= "<img src=\"" . $cfg['template']['url_template'] . "public/images/redstar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\">&nbsp;";
			}
		} else {
			if($_SESSION['sess_id'] != $params['id']){
				$ret .= "<a href=" . $rate_link . "&id=". $params['id'] ."&f=". $i ."><img src=\"" . $cfg['template']['url_template'] . "public/images/graystar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\"></a>&nbsp;";
			}else{
				$ret .= "<img src=\"" . $cfg['template']['url_template'] . "public/images/graystar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\">&nbsp;";
			}
		}
	}

	return $ret;
}

function smarty_rateme_ssl($params, &$smarty = null)
{
	global $cfg;

	if(isset($_SESSION['sess_id']) AND $_SESSION['sess_id'] != $params['id']){
		$rate_link = $cfg['path']['url_site'] . "mem_rateprofile.php?1=1";
	}else{
		$rate_link = $cfg['path']['url_site'] . "index.php" . "?error=" . urlencode("You need to login first to be able to rate");
	}

	for($i=1; $i<=5; $i++)
	{
		if($params['rating'] >= $i)
		{
			if($_SESSION['sess_id'] != $params['id']){
				$ret .= "<a href=" . $rate_link . "&id=". $params['id'] ."&f=". $i ."><img src=\"" . $cfg['template']['url_template_ssl'] . "public/images/redstar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\"></a>&nbsp;";
			}else{
				$ret .= "<img src=\"" . $cfg['template']['url_template_ssl'] . "public/images/redstar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\">&nbsp;";
			}
		} else {
			if($_SESSION['sess_id'] != $params['id']){
				$ret .= "<a href=" . $rate_link . "&id=". $params['id'] ."&f=". $i ."><img src=\"" . $cfg['template']['url_template_ssl'] . "public/images/graystar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\"></a>&nbsp;";
			}else{
				$ret .= "<img src=\"" . $cfg['template']['url_template_ssl'] . "public/images/graystar.gif\" alt=\"Rate " . $params['screenname'] . " with " . $i . " stars!\" style=\"border: 0px;\">&nbsp;";
			}
		}
	}

	return $ret;
}



function smarty_plugin_rating($params, &$smarty = null)
{
	global $cfg;

	for($i=1; $i<=5; $i++)
	{
		if($params['rating'] >= $i)
		{
			$ret .= "<a href=" . $cfg['path']['url_site'] . "mem_rateplugin.php?id=". $params['id'] ."&f=". $i ."><img src=\"" . $cfg['template']['url_template'] . "public/images/redstar.gif\" alt=\"Rate " . $params['title'] . " with " . $i . " stars!\" style=\"border: 0px;\"></a>&nbsp;";
		} else {
			$ret .= "<a href=" . $cfg['path']['url_site'] . "mem_rateplugin.php?id=". $params['id'] ."&f=". $i ."><img src=\"" . $cfg['template']['url_template'] . "public/images/graystar.gif\" alt=\"Rate " . $params['title'] . " with " . $i . " stars!\" style=\"border: 0px;\"></a>&nbsp;";
		}
	}

	return $ret;
}

function smarty_screenname($params, &$smarty = null)
{
	global $db;

	$screenname = @$db->get_var("SELECT `screenname` FROM `tblUsers` WHERE `id` = '" . $params['user_id'] . "' LIMIT 1");

	return $screenname?$screenname:'-Unknown-';
}

function smarty_lastlogin($params, &$smarty = null)
{
	$diff = time() - strtotime($params['lastlogin']);

	if((double) $diff <= (60*10) )
		return "Online";
	elseif((double) $diff >= (60*10) and (double) $diff < (60*60*24))
		return "Today";
    elseif((double) $diff >= (60*60*24) and (double) $diff < (60*60*24*2))
    	return "Yesterday";
    elseif((double) $diff >= (60*60*24*2) and (double) $diff < (60*60*24*7))
    	return "This Week";
    elseif((double) $diff >= (60*60*24*7) and (double) $diff < (60*60*24*14))
    	return "Last Week";
    else
    	return "This Month";


}

function smarty_remove_start($params, &$smarty = null) {
	if (strpos($params['str'], 'start=') !== false) {
		if (($amp = strpos($params['str'], '&')) === false) {
			$params['str'] = '';
		} else {
			$params['str'] = substr($params['str'], $amp);
		}
	}elseif(trim($params['str'])){
		$params['str'] = "&".$params['str'];
	}
	return $params['str'];
}
?>