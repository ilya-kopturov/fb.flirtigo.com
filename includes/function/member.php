<?

function rateme()
{
	global $cfg, $db;
	 
	for($param = 0; $param < count($cfg['profile']['looking']); $param++)
	{
		if($_SESSION['sess_looking'] & (1 << $param))
		{
			if(empty($sex))
			{
			    $sex  = "`sex` = '" . $param . "' ";
			} else {
				$sex .= "OR `sex` = '" . $param . "' ";
			}
		}
    }
     
    $sex = "(" . $sex . ")";
    
    $sql = "SELECT `id`,`screenname`,`sex`,`birthdate`,`country`,`rating`,`votes`,`withvideo` 
            FROM `tblUsers` WHERE `withpicture` = 'Y' AND " . $sex . " 
            ORDER BY rand() LIMIT 1";
     
    $rateme = $db->get_row($sql);
     
    return $rateme;
}

function whos_online($db, $search_options, $online_time = null)
{
	global $cfg;
	
	if((int) $online_time <= 0) $online_time = $cfg['option']['online_time'];
	
    $sql_search = "SELECT u.*
                    FROM tblUsers u 
                    WHERE u.hide = 'N' AND u.disabled = 'N' AND (u.`lastlogin` > '" . (date("Y-m-d H:i:s", time() - $online_time * 60)) . "' OR u.`typelogin` > '" . (date("Y-m-d H:i:s", time() - $online_time * 60 * 6)) . "') ";
     
    if(isset($search_options['sex']) AND $search_options['sex'] != ''){
    	$where .= " AND u.`sex` = '" . $db->escape($search_options['sex']) . "' ";
    }
     
    if(isset($search_options['looking']) AND $search_options['looking'] != ''){
	    $where .= " AND (u.`looking` & (1 << " . $search_options['looking'] . ")) ";
    }
     
    if(isset($search_options['withpicture'])){
    	$where .= "AND (u.`withpicture` = 'Y' OR `withvideo` = 'Y')";
    }
     
    if(isset($search_options['withvideo'])){
    	$where .= "AND u.`withvideo` = 'Y' ";
    }  
     
    return $sql_search . " " . $where;
}

function favorite_list($id, $limit = null)
{
	global $db;
	
	$sql_favorite  = "SELECT   `friend_user_id` as id 
	                  FROM     `tblHotBlockList` 
	                  WHERE    `user_id` = '" . $id . "' AND `type` = 'H' 
	                  ORDER BY `friend_user_id` ASC ";
	
	if( (int) $limit > 0){
		$sql_favorite .= "LIMIT " . (int) $limit;
	}
	
	$favorite_list = @$db->get_results($sql_favorite);
	
	return $favorite_list;
}

function profile_stats($id)
{
	global $db;
	
	/*$profile_stats['viewed_profile'] = (int) 34 + @$db->get_var("SELECT COUNT(*) FROM `tblViewedProfile` 
	                                                                  WHERE `user_id` = '" . $id . "'");
	$profile_stats['viewed_pics']    = (int) @$db->get_var("SELECT SUM(`photo_viewed`) FROM `tblPhotos` 
	                                                                             WHERE `user_id` = '" . $id . "'");
	$profile_stats['added_hotlists'] = (int) @$db->get_var("SELECT COUNT(*) FROM `tblHotBlockList` 
	                                                                  WHERE `friend_user_id` = '" . $id . "' AND 
	                                                                        `type` = 'H'");
	*/
	
	$public_pictures = (int) @$db->get_var("SELECT COUNT(*) 
	                                        FROM   `tblPhotos` 
	                                        WHERE  `user_id` = '" . $id . "' AND `gallery` = '1'
	                                        LIMIT 1");
	
	$profile_stats['public_pictures'] = $public_pictures ? "Yes" : "No";

	$public_videos   = (int) @$db->get_var("SELECT COUNT(*) 
	                                        FROM   `tblVideos` 
	                                        WHERE  `user_id` = '" . $id . "' AND `gallery` = '1'
	                                        LIMIT 1");
	
	$profile_stats['public_videos'] = $public_videos ? "Yes" : "No";
	
	$hide_profile    = (int) @$db->get_var("SELECT COUNT(*) 
	                                        FROM   `tblUsers` 
	                                        WHERE  `id` = '" . $id . "' AND `hide` = 'Y'
	                                        LIMIT 1");
	
	$profile_stats['hide_profile'] = $hide_profile ? "Yes" : "No";	
	
	return $profile_stats;
}

function most_wanted($db, $mostwanted)
{
	$showme = (int) $mostwanted['showme'];
	$of     = (int) $mostwanted['of'] = isset($mostwanted['of'])==true?$mostwanted['of']:'1'; //($_SESSION['sess_looking']&(1<<0)==true?0:1);
	
	$age_from = (int) $mostwanted['age_from'];
	$age_from = $age_from==0?18:$age_from;
	
	$age_to = (int) $mostwanted['age_to'];
	$age_to = $age_to==0?99:$age_to;
	
	$tbl    = array(0 => 'Photos', 1 => 'Videos');
	$with   = array(0 => 'withpicture', 1 => 'withvideo');
	
	$ordby = array('date'   => '`tbl'.$tbl[$showme].'`.`upload_date`', 
	               'viewed' => '`tbl'.$tbl[$showme].'`.`'. strtolower(substr($tbl[$showme],0,-1)) .'_viewed`');
	
	if(isset($mostwanted['category']))
	{
		$sql = "SELECT `tbl" . $tbl[$showme] . "`.`user_id` as id, `tbl" . $tbl[$showme] . "`.`id` as content_id,`tblUsers`.`screenname` as screenname,`tblUsers`.`rating` as rating, `tblUsers`.`birthdate`, `tblUsers`.`country`, `tblUsers`.`state`, `tblUsers`.`city`, `tblUsers`.`typeloc`, `tblUsers`.`sex`,
		               " . $ordby['date'] . " as date, " . $ordby['viewed'] . " as viewed 
		        FROM `tbl" . $tbl[$showme] . "`, `tblUsers` 
	            WHERE `tbl" . $tbl[$showme] . "`.`user_id` != '" . $_SESSION['sess_id'] . "' AND 
	                  `tbl" . $tbl[$showme] . "`.`user_id` = `tblUsers`.`id` AND 
	                  `tbl" . $tbl[$showme] . "`.`approved` = 'Y' AND `tbl" . $tbl[$showme] . "`.`gallery`  = '1' AND
	                  `tblUsers`.`mostwanted` = 'Y' AND `tblUsers`.`hide` = 'N' AND `tblUsers`.`disabled` = 'N' AND 
	                  `tblUsers`.`sex` = '" . $mostwanted['category'] . "' 
	            GROUP BY id 
	            ORDER BY rating DESC, `votes` DESC";
	    
	    if($_SERVER['REMOTE_ADDR'] == '89.36.246.229'){
	    	echo $sql;
	    }
	}
	elseif(isset($mostwanted['content']))
	{
		$sql = "SELECT `tbl" . $tbl[$showme] . "`.`user_id` as id, `tbl" . $tbl[$showme] . "`.`id` as content_id, `tblUsers`.`screenname` as screenname, `tblUsers`.`rating` as rating, `tblUsers`.`birthdate`, `tblUsers`.`country`, `tblUsers`.`state`, `tblUsers`.`city`, `tblUsers`.`typeloc`, `tblUsers`.`sex`,
		               " . $ordby['date'] . " as date, " . $ordby['viewed'] . " as viewed
		        FROM  `tbl" . $tbl[$showme] . "`, `tblUsers` 
		        WHERE `tbl" . $tbl[$showme] . "`.`user_id` != '" . $_SESSION['sess_id'] . "' AND 
		              `tbl" . $tbl[$showme] . "`.`user_id` = `tblUsers`.`id` AND 
		              `tbl" . $tbl[$showme] . "`.`approved` = 'Y' AND `tbl" . $tbl[$showme] . "`.`gallery`  = '1' AND 
		              `tblUsers`.`mostwanted` = 'Y' AND `tblUsers`.`hide` = 'N' AND `tblUsers`.`disabled` = 'N' AND 
		              `tblUsers`.`sex` = '" . $of . "' AND 
	        	      `tblUsers`.`birthdate` <= '" . birthday($age_from) . "' AND 
	            	  `tblUsers`.`birthdate` >= '" . birthday($age_to)   . "' 
	            GROUP BY id 
		        ORDER BY " . $ordby[$mostwanted['content']] . " DESC, `votes` DESC";
	}
	else
	{
		$sql = "SELECT `tbl" . $tbl[$showme] . "`.`user_id` as id, `tbl" . $tbl[$showme] . "`.`id` as content_id, `tblUsers`.`screenname` as screenname,`tblUsers`.`rating` as rating, `tblUsers`.`birthdate`, `tblUsers`.`country`, `tblUsers`.`state`, `tblUsers`.`city`, `tblUsers`.`typeloc`, `tblUsers`.`sex`, 
		               " . $ordby['date'] . " as date, " . $ordby['viewed'] . " as viewed
		        FROM  `tbl" . $tbl[$showme] . "`, `tblUsers` 
                WHERE `tbl" . $tbl[$showme] . "`.`user_id` != '" . $_SESSION['sess_id'] . "' AND 
                      `tbl" . $tbl[$showme] . "`.`user_id` = `tblUsers`.`id` AND 
                      `tbl" . $tbl[$showme] . "`.`approved` = 'Y' AND `tbl" . $tbl[$showme] . "`.`gallery`  = '1' AND
                      `tblUsers`.`mostwanted` = 'Y' AND `tblUsers`.`hide` = 'N' AND `tblUsers`.`disabled` = 'N' AND 
                      `tblUsers`.`sex` = '" . $of . "' AND 
                      `tblUsers`.`birthdate` <= '" . birthday($age_from) . "' AND 
                      `tblUsers`.`birthdate` >= '" . birthday($age_to)   . "' AND 
                      `tblUsers`.`" . $with[$showme] ."` = 'Y' 
                GROUP BY id ";
		
		if(isset($mostwanted['orderby']) AND ($mostwanted['orderby'] == 'rating' or $mostwanted['orderby'] == 'linked') ){
			$sql .= "ORDER BY " . $mostwanted['orderby'] . " DESC, `votes` DESC";
		}
		else
		{
			$sql .= "ORDER BY `lastlogin` DESC";
		}
	}
	
	return $sql;
}

function featured($linktype)
{
	global $db;

	$html .= "<table border='0' cellpadding='0' cellspacing='0'>";
	$html .= "<tr>";
	
    $featured = @$db->get_results("SELECT `id`, `screenname` FROM `tblUsers` WHERE `featured` = 'Y'");
    
    for($i=0; $i<count($featured); $i++)
    {
    	$html .= "<td style='padding: 5px 5px 5px 5px;'>";
    	if($linktype == 'external'){
			$html .= "<a target='_parent' href='".$cfg['path']['url_site']."join.php'><img width='70' height='70' src='". $cfg['path']['url_site']."showphoto.php?id=".$featured[$i]['id']."&t=r&f=Y&p=1' border='1' style='border-color: #FFFFFF;' alt='".$featured[$i]['screenname']."'>";
		}else{
			$html .= "<a target='_parent' href='".$cfg['path']['url_site']."mem_profile.php?id=".$featured[$i]['id']."'><img width='70' height='70' src='". $cfg['path']['url_site']."showphoto.php?id=".$featured[$i]['id']."&t=r&f=Y&p=1' border='1' style='border-color: #FFFFFF;' alt='".$featured[$i]['screenname']."'>";
		}
		$html .= "</td>";
		
		if($i%2 == 1 and $i != (int) (count($featured) - 1) ){
			$html .= "</tr><tr>";
		}
    }
	
	$html .= "</tr>";
	$html .= "</table>";
	
	return $html;
}

function featuredPopular($type)
{
	global $db, $cfg;
	
	if($type == "big"){
		$html = "<table class=\"featuredPopular\" cellpadding=\"0\" cellspacing=\"0\">
          <tr>
            <td class=\"featuredPopular1\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_featured_active.gif\" 
                   onmouseover=\"mouseOver('f', '" . $cfg['template']['url_template'] . "');\" 
                   onmouseout=\"mouseOut('f', '" . $cfg['template']['url_template'] . "');\" 
                   onclick=\"mouseClick('f', '" . $cfg['template']['url_template'] . "', 'big');\" 
                   id=\"f\" class=\"featuredPopular1\" />            </td> 
            <td class=\"featuredPopular2\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_graypixel.gif\" class=\"featuredPopular2\" />
            </td>
            <td class=\"featuredPopular3\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_mostpopular_inactive.gif\" 
                   onmouseover=\"mouseOver('mp', '" . $cfg['template']['url_template'] . "');\" 
                   onmouseout=\"mouseOut('mp', '" . $cfg['template']['url_template'] . "');\" 
                   onclick=\"mouseClick('mp', '" . $cfg['template']['url_template'] . "', 'big');\" 
                   id=\"mp\" class=\"featuredPopular3\" />
            </td>
            <td class=\"featuredPopular4\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_graypixel.gif\" class=\"featuredPopular4\" />
            </td>
          </tr>
          <tr>
            <td class=\"featuredPopular5\" colspan=\"4\">Members currently viewing these video profiles:</td>
          </tr>
          <tr>
            <td class=\"featuredPopular5\" colspan=\"4\">
              <div class=\"featuredPopular\">
                <div id=\"hiddenpic\" class=\"featuredPopular2\">
                  <img src=\"" . $cfg['template']['url_template'] . "public/images/loading.gif\" /> Loading...
                </div>
                <div id=\"fm_write\" class=\"featuredPopularWrite\">
                  ". file_get_contents($cfg['path']['url_site'] . "featuredbig.php") ."
                </div>
              </div>
            </td>
          </tr>
        </table>";
	}else{
		$html = "<table class=\"featuredPopularSmall\" cellpadding=\"0\" cellspacing=\"0\">
          <tr>
            <td class=\"featuredPopular1\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_featured_active.gif\" 
                   onmouseover=\"mouseOver('f', '" . $cfg['template']['url_template'] . "');\" 
                   onmouseout=\"mouseOut('f', '" . $cfg['template']['url_template'] . "');\" 
                   onclick=\"mouseClick('f', '" . $cfg['template']['url_template'] . "', 'small');\" 
                   id=\"f\" class=\"featuredPopular1\" />            </td> 
            <td class=\"featuredPopular2\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_graypixel.gif\" class=\"featuredPopular2\" />
            </td>
            <td class=\"featuredPopular3\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_mostpopular_inactive.gif\" 
                   onmouseover=\"mouseOver('mp', '" . $cfg['template']['url_template'] . "');\" 
                   onmouseout=\"mouseOut('mp', '" . $cfg['template']['url_template'] . "');\" 
                   onclick=\"mouseClick('mp', '" . $cfg['template']['url_template'] . "', 'small');\" 
                   id=\"mp\" class=\"featuredPopular3\" />
            </td>
            <td class=\"featuredPopular4Small\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_graypixel.gif\" class=\"featuredPopular4Small\" />
            </td>
          </tr>
          <tr>
            <td class=\"featuredPopular5\" colspan=\"4\" style=\"text-align: left;\">
              <div class=\"featuredPopularSmall\">
                <div id=\"hiddenpic\" class=\"featuredPopular2Small\">
                  <img src=\"" . $cfg['template']['url_template'] . "public/images/loading.gif\" /> Loading...
                </div>
                <div id=\"fm_write\" class=\"featuredPopularWrite\">
                  ". file_get_contents($cfg['path']['url_site'] . "featuredsmall.php") ."
                </div>
              </div>
            </td>
          </tr>
        </table>";
	}
	
	return $html;
}

function mem_featuredPopular($type)
{
	global $db, $cfg;
	
	if($type == "big"){
		$html = "<table class=\"featuredPopular\" cellpadding=\"0\" cellspacing=\"0\">
          <tr>
            <td class=\"featuredPopular1\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_featured_active.gif\" 
                   onmouseover=\"mem_mouseOver('f', '" . $cfg['template']['url_template'] . "');\" 
                   onmouseout=\"mem_mouseOut('f', '" . $cfg['template']['url_template'] . "');\" 
                   onclick=\"mem_mouseClick('f', '" . $cfg['template']['url_template'] . "', 'big');\" 
                   id=\"f\" class=\"featuredPopular1\" />            </td> 
            <td class=\"featuredPopular2\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_graypixel.gif\" class=\"featuredPopular2\" />
            </td>
            <td class=\"featuredPopular3\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_mostpopular_inactive.gif\" 
                   onmouseover=\"mem_mouseOver('mp', '" . $cfg['template']['url_template'] . "');\" 
                   onmouseout=\"mem_mouseOut('mp', '" . $cfg['template']['url_template'] . "');\" 
                   onclick=\"mem_mouseClick('mp', '" . $cfg['template']['url_template'] . "', 'big');\" 
                   id=\"mp\" class=\"featuredPopular3\" />
            </td>
            <td class=\"featuredPopular4\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_graypixel.gif\" class=\"featuredPopular4\" />
            </td>
          </tr>
          <tr>
            <td class=\"featuredPopular5\" colspan=\"4\">Members currently viewing these video profiles:</td>
          </tr>
          <tr>
            <td class=\"featuredPopular5\" colspan=\"4\">
              <div class=\"featuredPopular\">
                <div id=\"hiddenpic\" class=\"featuredPopular2\">
                  <img src=\"" . $cfg['template']['url_template'] . "public/images/loading.gif\" /> Loading...
                </div>
                <div id=\"fm_write\" class=\"featuredPopularWrite\">
                  ". file_get_contents($cfg['path']['url_site'] . "mem_featuredbig.php") ."
                </div>
              </div>
            </td>
          </tr>
        </table>";
	}else{
		$html = "<table class=\"featuredPopularSmall\" cellpadding=\"0\" cellspacing=\"0\">
          <tr>
            <td class=\"featuredPopular1\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_featured_active.gif\" 
                   onmouseover=\"mem_mouseOver('f', '" . $cfg['template']['url_template'] . "');\" 
                   onmouseout=\"mem_mouseOut('f', '" . $cfg['template']['url_template'] . "');\" 
                   onclick=\"mem_mouseClick('f', '" . $cfg['template']['url_template'] . "', 'small');\" 
                   id=\"f\" class=\"featuredPopular1\" />            </td> 
            <td class=\"featuredPopular2\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_graypixel.gif\" class=\"featuredPopular2\" />
            </td>
            <td class=\"featuredPopular3\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_mostpopular_inactive.gif\" 
                   onmouseover=\"mem_mouseOver('mp', '" . $cfg['template']['url_template'] . "');\" 
                   onmouseout=\"mem_mouseOut('mp', '" . $cfg['template']['url_template'] . "');\" 
                   onclick=\"mem_mouseClick('mp', '" . $cfg['template']['url_template'] . "', 'small');\" 
                   id=\"mp\" class=\"featuredPopular3\" />
            </td>
            <td class=\"featuredPopular4Small\">
              <img src=\"" .$cfg['template']['url_template'] . "public/images/dirtyflirting_graypixel.gif\" class=\"featuredPopular4Small\" />
            </td>
          </tr>
          <tr>
            <td class=\"featuredPopular5\" colspan=\"4\" style=\"text-align: left;\">
              <div class=\"featuredPopularSmall\">
                <div id=\"hiddenpic\" class=\"featuredPopular2Small\">
                  <img src=\"" . $cfg['template']['url_template'] . "public/images/loading.gif\" /> Loading...
                </div>
                <div id=\"fm_write\" class=\"featuredPopularWrite\">
                  ". file_get_contents($cfg['path']['url_site'] . "mem_featuredsmall.php") ."
                </div>
              </div>
            </td>
          </tr>
        </table>";
	}
	
	return $html;
}

function relationship($member_1, $member_2, $type)
{
	global $db;
	
	$is = 0;
	$is = @$db->query("SELECT `type` FROM `tblHotBlockList` 
								     WHERE `user_id` = '" . $member_1 . "' AND 
		                                   `friend_user_id` = '" . $member_2 . "' AND 
		                                   `type` = '" . $type . "' 
		                             LIMIT 1");
	
	if($is) return TRUE;
	return FALSE;
}

function checkflirt($from, $to)
{
	global $db;
	
	$is = 0;
	$is = @$db->query("SELECT `from` FROM `tblWhispersSent` 
								     WHERE `from` = '" . $from . "' AND 
		                                   `to`   = '" . $to . "' 
		                             LIMIT 1");
	
	if($is) return TRUE;
	return FALSE;
}

function reachedflirt($from)
{
	global $db;
	
	$date = date("Y-m-d");
	
	$is = 0;
	$is = @$db->get_var("SELECT COUNT(*) as count FROM `tblWhispersSent` 
								                  WHERE `from` = '" . $from . "' AND 
		                                                `date` like '" . $date . "%' 
		                                          LIMIT 1");
	
	if($is >= 4) return TRUE;
	return FALSE;
}

/**
 * Enter description here...
 *
 * @param integer $userid
 * @param array $friendid (array with ids for deleting)
 * @param string $type (values H or B)
 */
function delete_hotblocklist($userid, $friendids, $type){
	global $db;
	
	if(count($friendids) > 0){
		$sql = "DELETE FROM `tblHotBlockList` WHERE `user_id` = '" . $userid . "' AND (";
	
		foreach($friendids as $value){
			$sql .= " `friend_user_id` = " . (int) $value. " OR ";
		}
	
		$sql = substr($sql, 0, -4) . ") AND `type` = '" . $type . "'";
	
		@$db->query($sql);
	}
}
?>
