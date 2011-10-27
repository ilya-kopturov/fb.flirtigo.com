<?php
/* $Id: general.php 689 2008-06-30 14:30:54Z bogdan $ */

/* DIRTYFLIRTING.COM */

function get_mime_type($file) {
	global $cfg;

	$handle = popen("{$cfg['path']['cmd_file']} $file", 'r');
	$read = fread($handle, 1024);
	pclose($handle);

	return $read;
}

function stats($db, $online_time = null, $new_time = 43200)
{
	if (defined('DEBUG')) return array('total' => '999,999.5', 'online' => '1/3'); // faster, damn it! >:o)

	global $cfg;

	if((int) $online_time >= 0) $online_time = $cfg['option']['online_time'];


	$stats['total']  = number_format( (int) $db->get_var("SELECT COUNT(*) FROM `tblUsers`"), 0, "", ",");
	$stats['online'] = $db->get_var("SELECT COUNT(*) FROM `tblUsers` WHERE `lastlogin` > '" . (date("Y-m-d H:i:s", time() - $online_time * 60)) . "' OR `typelogin` > '" . (date("Y-m-d H:i:s", time() - $online_time * 60 * 6)) . "'");

	$_SESSION['sess_online'] = $stats['online'];

	return $stats;
}

function verify($length)
{
  $pattern = "123456789abcdefghijklmnpqrstuvwxyz";
  for($i=0;$i<$length;$i++)
  {
   if(isset($key))
     $key .= $pattern{rand(0,33)};
   else
     $key = $pattern{rand(0,33)};
  }
  return $key;
}

function id_to_screenname($id)
{
	global $db;

	$screenname = @$db->get_var("SELECT `screenname` FROM `tblUsers` WHERE `id` = '" . $id . "' LIMIT 1");

	return $screenname?$screenname:'-Unknown-';
}

function operator_to_name($id)
{
	$query = @mysql_query("SELECT `user` FROM `tblAdmin` WHERE `id` = '" . $id . "' LIMIT 1");
	$arr = @mysql_fetch_array($query);
	return $arr['user']?$arr['user']:'-Unknown-';
}

function ip2country($ip)
{
	$sql = "SELECT `country` FROM `tblNationsIp` WHERE `ip` < INET_ATON('" . $ip . "') ORDER BY ip DESC LIMIT 0,1";
	list($country) = @mysql_fetch_row(mysql_query($sql));

	return $country;
}

function ip2area($ip)
{
	$sql = 'SELECT c.id, c.area, c.country, c.iso_country 
	        FROM 
	            ip2nationCountries c,
	            ip2nation i 
	        WHERE 
	            i.ip < INET_ATON("'.$ip.'") 
	            AND 
	            c.code = i.country 
	        ORDER BY 
	            i.ip DESC 
	        LIMIT 0,1';

	return @mysql_fetch_assoc(mysql_query($sql));
}

function forgot_password($db, $email)
{
	$found = $db->get_row("SELECT `id`, `screenname`, `pass` FROM `tblUsers` WHERE `email` = '" . $email . "'");

	if ($result = ($found['screenname'] and $found['pass']))
	{
		mailermachine($db,'Y','forgot','external',$found['id'],-1);
	}

	return $result;
}

function build_result_pages($sql, $start) {
	global $db;

    function remove_start($str) {
        if (strpos($str, 'start=') !== false) {
            if (($amp = strpos($str, '&')) === false) {
                $str = '';
            } else {
                $str = substr($str, $amp+1);
            }
        }

        return $str;
    }

    function current_page($start) {
        if ($start==0) {
            return 1;
        } else {
            return $start / 10 + 1;
        }
    }

    global $_SERVER, $cfg;

    $counter = $db->get_var("SELECT COUNT(*) " . substr($sql, strpos($sql, 'FROM')));
    $pages = ceil($counter/10);

    if ($pages < 2) {
        return '';
    }

    $query_str = remove_start($_SERVER["QUERY_STRING"]);

/*
    if ($start == 0) {
        $prev_nav = "&lt;";
        $start_nav = "&lt;&lt;";
    } else {
        $prev_nav = "<a href=\"".$_SERVER['SCRIPT_NAME'].'?start='.($start-10).($query_str?'&'.$query_str:'') ."\" class=\"featuredBoxLink\">&lt;</a>";
        $start_nav = "<a href=\"".$_SERVER['SCRIPT_NAME'].'?start=0'.($query_str?'&'.$query_str:'') ."\" class=\"featuredBoxLink\">&lt;&lt;</a>";
    }

    if ((floor($counter/10)*10) == $start) {
        $next_nav = "&nbsp; &gt;";
        $end_nav  = "&nbsp; &gt;&gt;";
    } else {
        $next_nav = "<a href=\"".$_SERVER['SCRIPT_NAME'].'?start='.($start+10).($query_str?'&'.$query_str:'')."\" class=\"featuredBoxLink\">&gt;</a>";
        $end_nav  = "<font class=\"featuredBoxLink\">&gt;&gt;";
    }
*/
	$prev_nav = "<a href=\"".$_SERVER['SCRIPT_NAME'].'?start='.(($start >= 10) ? $start-10 : 0).($query_str?'&'.$query_str:'') ."\" class=\"featuredBoxLink\">&lt;</a>";
	$start_nav = "<a href=\"".$_SERVER['SCRIPT_NAME'].'?start=0'.($query_str?'&'.$query_str:'') ."\" class=\"featuredBoxLink\">&lt;&lt;</a>";
	$next_nav = "<a href=\"".$_SERVER['SCRIPT_NAME'].'?start='.($start+10).($query_str?'&'.$query_str:'')."\" class=\"featuredBoxLink\">&gt;</a>";
	$end_nav = "<a href=\"".$_SERVER['SCRIPT_NAME'].'?start=' . round($counter / $cfg['option']['profiles_per_page']) . ($query_str?'&'.$query_str:'')."\" class=\"featuredBoxLink\">&gt;&gt;</a>";
    // build pages
    $curr_page_index = 0;
    $pages_array = array();

    for ($i=1; $i<=$pages; $i++) {
        if ($i == current_page($start)) {
            $curr_page_index = $i;
        }
        $pages_array[] = $i;
    }

    // Left
    $left_array = array();
    for($l=$curr_page_index-2; $l >= $curr_page_index-10; $l--) {
        $left_array[] = "<a href=\"".$_SERVER['SCRIPT_NAME'].'?start='.(($pages_array[$l]-1)*10).($query_str?'&'.$query_str:'')."\" class=\"featuredBoxLink\">$pages_array[$l]</a>";
        if ($l == 0) break;
    }

    // Right
    $right_array = array();
    for($r=$curr_page_index; $r < $curr_page_index+9; $r++) {
        if (!$pages_array[$r]) break;
        $right_array[] = "<a href=\"".$_SERVER['SCRIPT_NAME'].'?start='.(($pages_array[$r]-1)*10).($query_str?'&'.$query_str:'')."\" class=\"featuredBoxLink\">$pages_array[$r]</a>";
    }


    $pages_nav = implode(' ', array_reverse($left_array)) . "<font color=\"black\">" . " $curr_page_index " . "</font>" . implode(' ', $right_array);
    $nav = "$start_nav&nbsp; $prev_nav&nbsp;&nbsp;$pages_nav&nbsp;&nbsp;$next_nav &nbsp;$end_nav";
    return $nav;
}

function build_pre_next($start, $perpage, $tagid = "show_rateprofiles") {

    function remove_start($str) {
        if (strpos($str, 'start=') !== false) {
            if (($amp = strpos($str, '&')) === false) {
                $str = '';
            } else {
                $str = substr($str, $amp+1);
            }
        }
        return $str;
    }

    function set_fragment($str){
    	if(strpos($str, 'tab=Most_Viewed') !== false){
    		return "Most_Viewed";
    	}
    	return "Top_Rated";
    }

    global $cfg, $_SERVER;

    $query_str = remove_start($_SERVER["QUERY_STRING"]);


    if ($start == 0) {
        $prev_nav = "&lt; Previous";
    } else {
    	$prev_nav = "&lt <a href=\"#Load_Page".$start."\" onclick=\"$('#".$tagid."').load('".$cfg['path']['url_site'].$_SERVER['SCRIPT_NAME']."?start=".($start-$perpage)."&".smarty_rnd_md5().($query_str?'&'.$query_str:'') ."#Load_Page".$start."');\" class=\"mostwanted\" style=\"color: #7E0000;\">Previous</a>";
    }

    $next_nav = "<a href=\"#Load_Page".$start."\" onclick=\"$('#".$tagid."').load('".$cfg['path']['url_site'].$_SERVER['SCRIPT_NAME']."?start=".($start+$perpage)."&".smarty_rnd_md5().($query_str?'&'.$query_str:'')."#Load_Page".$start."');\" class=\"mostwanted\" style=\"color: #7E0000;\">Next</a> &gt;";

    $back = "<a href=\"#Load_Page".$start."\" onclick=\"$('#".$tagid."').load('".$cfg['path']['url_site'].$_SERVER['SCRIPT_NAME']."?start=0&".smarty_rnd_md5().($query_str?'&'.$query_str:'')."#Load_Page".$start."');\" class=\"mostwanted\" style=\"color: #7E0000;\">Back to rate profiles</a>";


    $nav = "[&nbsp; $prev_nav&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$next_nav &nbsp;]";
    return $nav;
}

function dfcams($access_id = 'XGXU1C', $niche = 'amateur')
{
	$camNr = $nextNr = 0;

	//$current_hour = (int) date("H") - ((int) (date("O") / 100) + 5);
	$current_hour = (int) date("H") + 1;//   - 5;

	if(!isset($_SESSION['cams']) or $_SESSION['cams']['hour'] != $current_hour)
	{
		$xml    = simplexml_load_file(dirname(dirname(dirname(__FILE__))) . "/" . "livecams.php");
		if(!$xml){return;}
		unset($_SESSION['cams']);
		foreach ($xml->show as $show) {
   			$response['shows'][$camNr]['show_link']              = (string) $show->show_link;
   			$response['shows'][$camNr]['start_24']               = (string) $show->start_24;
   			$response['shows'][$camNr]['performer_schedule_pic'] = (string) $show->performer_schedule_pic;
   			$response['shows'][$camNr]['performer_name']         = (string) $show->performer_name;
   			$response['shows'][$camNr]['description']            = preg_replace(array('/\*{2,}/'),'*', (string) $show->description);
   			
   			if((int) $current_hour == (int) substr($response['shows'][$camNr]['start_24'], 0, 2)){
   				$_SESSION['cams']['live'][] = (array) $response['shows'][$camNr];
   			}elseif(((int) $current_hour < (int) substr($response['shows'][$camNr]['start_24'], 0, 2)) && $nextNr < 4){
   				$_SESSION['cams']['next'][] = (array) $response['shows'][$camNr];
   				$nextNr++;
   			}

   			$camNr++;
		}

		$_SESSION['cams']['hour'] = $current_hour;
	}

	/**
	 * Set Cams Nr. to 0
	 */
	$camNr = $nextNr = 0;
	
	if(!isset($_SESSION['porncams']) or $_SESSION['porncams']['hour'] != $current_hour)
	{
		$xml    = simplexml_load_file(dirname(dirname(dirname(__FILE__))) . "/" . "livecamsp.php");
		if(!$xml){return;}
		unset($_SESSION['porncams']);
		foreach ($xml->show as $show) {
   			$response['shows'][$camNr]['show_link']              = (string) $show->show_link;
   			$response['shows'][$camNr]['start_24']               = (string) $show->start_24;
   			$response['shows'][$camNr]['performer_schedule_pic'] = (string) $show->performer_schedule_pic;
   			$response['shows'][$camNr]['performer_name']         = (string) $show->performer_name;
   			$response['shows'][$camNr]['description']            = preg_replace(array('/\*{2,}/'),'*', (string) $show->description);
   			
   			if((int) $current_hour == (int) substr($response['shows'][$camNr]['start_24'], 0, 2)){
   				$_SESSION['porncams']['live'][] = (array) $response['shows'][$camNr];
   			}elseif(((int) $current_hour < (int) substr($response['shows'][$camNr]['start_24'], 0, 2)) && $nextNr < 4){
   				$_SESSION['porncams']['next'][] = (array) $response['shows'][$camNr];
   				$nextNr++;
   			}

   			$camNr++;
		}

		$_SESSION['porncams']['hour'] = $current_hour;
	}
}

function header_location($redirect = 'mem_index.php')
{
	global $db;

	@$db->close();
	header("Location: " . $redirect);
	exit;
}

function bannedwords($type = "B", $text = "")
{
	global $db;

	$words = $db->get_results("SELECT `word` FROM `tblFilters` WHERE `type` != '" . $type . "'");
	if (is_array($words)) {
		foreach($words as $key => $value)
		{
			$replace_what[] = $value['word'];

			$stars = ""; for($i=0; $i<2*strlen($value['word']); $i++) $stars .= "*";

			$replace_with[] = $stars;
		}

		/*echo $text . "<br/>";
		echo "<pre>"; print_r($replace_what); echo "</pre>";
		echo "<pre>"; print_r($replace_with); echo "</pre>";
		*/

		$text = str_replace($replace_what, $replace_with, $text);
	}

	return $text;
}

function createlink($value, $action){
	global $_SERVER;

	if(empty($_SERVER['QUERY_STRING'])){
		return ($action>0?$value:"");
	}else{
		$query = str_replace( array($value, "&&", "?&"), array(""), $_SERVER['QUERY_STRING']);
		if(empty($query)){
			return ($action>0?$value:"");
		}else{
			return $query . ($action>0?"&".$value:"");
		}
	}
}

function videogallery($db, $search_options)
{
	global $cfg;
	
    $sql_search = "SELECT v.id as videoid, v.user_id, v.gallery, u.id, u.screenname, u.rating, u.withpicture, u.withvideo,
                          u.birthdate, u.sex, u.typeloc, u.city, u.country, u.state, u.joined, u.lastlogin,
                          u.looking, u.for, u.introtitle 
                   FROM `tblVideos` v INNER JOIN `tblUsers` u ON (v.user_id = u.id) WHERE v.`approved` = 'Y' ";
     
    if(isset($search_options['sex']) AND $search_options['sex'] != ''){
    	$where .= " AND u.`sex` = '" . $db->escape($search_options['sex']) . "' ";
    }
     
    if(isset($search_options['looking']) AND $search_options['looking'] != ''){
	    $where .= " AND (u.`looking` & (1 << " . $search_options['looking'] . ")) ";
    }

    return $sql_search . " " . $where;
}

function picturegallery($db, $search_options)
{
	global $cfg;
	
    $sql_search = "SELECT p.id as pictureid, p.user_id, p.gallery, u.id, u.screenname, u.rating, u.withpicture, u.withvideo,
                          u.birthdate, u.sex, u.typeloc, u.city, u.country, u.state, u.joined, u.lastlogin,
                          u.looking, u.for, u.introtitle 
                   FROM `tblPhotos` p INNER JOIN `tblUsers` u ON (p.user_id = u.id) WHERE p.`approved` = 'Y' ";
     
    if(isset($search_options['sex']) AND $search_options['sex'] != ''){
    	$where .= " AND u.`sex` = '" . $db->escape($search_options['sex']) . "' ";
    }
     
    if(isset($search_options['looking']) AND $search_options['looking'] != ''){
	    $where .= " AND (u.`looking` & (1 << " . $search_options['looking'] . ")) ";
    }

    return $sql_search . " " . $where;
}

function checkProfile($userid){
	
	$basic = $extended = TRUE;
	
	$sqlU = "SELECT `city`, `state`, `country`, `introtitle`, `introtext`, `describe`
		     FROM   `tblUsers`
		     WHERE  `id` = " . $userid;
		
	$arrBasic = mysql_fetch_row(mysql_query($sqlU));
		
	foreach($arrBasic as $key => $val){
		if(!$val){
			$basic = false;
		}
	}
		
	/* Extended */
	if($basic){
			
				$sqlU = "SELECT `for`, `bodytype`, `height`, `weight`, `haircolor`, `eyecolor`, `ethnicity`,
				                `smoking`, `drinking`, `sexualactivities`
		         		FROM   `tblUsers`
		         		WHERE  `id` = " . $userid;
		
				$arrExtended = mysql_fetch_row(mysql_query($sqlU));
		
				foreach($arrExtended as $key => $val){
					if(!$val){
						$extended = false;
					}
				}
			
	}else{
		$extended = FALSE;
	}
	
	return array($basic, $extended);
}
?>