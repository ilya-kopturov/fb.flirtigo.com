<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

$result = @$db->get_row("SELECT `id`, `screenname`, `email`, `pass`, `sex`, `looking`, `accesslevel`, `votes`, `rating` FROM `tblUsers` WHERE `id` = '". (int) $_GET['e_id']."' LIMIT 1");

$check_login = $result['screenname'] . "|" . $result['pass'];
$check_login = md5($check_login);

if($check_login == $_GET['login'])
{
    $_SESSION["sess_id"]          = $result['id'];
    $_SESSION["sess_screenname"]  = $result['screenname'];
    $_SESSION["sess_pass"]        = $result['pass'];
    $_SESSION["sess_sex"]         = $result['sex'];
    $_SESSION["sess_looking"]     = $result['looking'];
    $_SESSION["sess_accesslevel"] = $result['accesslevel'];
    $_SESSION["sess_rating"]      = $result['rating'];
    $_SESSION["sess_votes"]       = $result['votes'];
    
    /*session_register("sess_id", "sess_screenname", "sess_pass", "sess_sex", "sess_looking", "sess_accesslevel", "sess_rating");*/
    
    @$db->query("UPDATE `tblUsers` SET `firsttime` = 'Y', `lastlogin` = NOW() WHERE `id` = '" . $_SESSION['sess_id'] . "'");
    
    if($_GET['u_id'] == 'Y'){
    	@$db->query("UPDATE `tblUsers` SET `emailnotif` = 'N', `whispernotif` = 'N', `newsletternotif` = 'N' WHERE `id` = '" . $_SESSION['sess_id'] . "'");
    }
    
    $updatecamptbl="SELECT `id` FROM `tblCampaignMails` WHERE `campaignid` = '". (int) $_GET['c_id']."' AND 
                                                                  `toemail` = '" . urldecode($result['email'])."' AND 
                                                                  `sent` = 'Y' AND `login` = 'N'";
    //mail("chris@w2interactive.com","VISITED SCRIPT HB",$updatecamptbl);
    $nr_rows  = $db->query($updatecamptbl);

    if($nr_rows > 0)
	{
		@$db->query("UPDATE `tblCampaignMails` SET `login` = 'Y', `dateviewed` = NOW() WHERE `campaignid` = '". (int) $_GET['c_id']."' AND 
                                                                                  `toemail` = '" . urldecode($result['email'])."' AND 
                                                                                  `sent` = 'Y' AND `login` = 'N'");
		@$db->query("UPDATE `tblCampaign` SET `login` = `login` + 1 WHERE `id` = '". (int) $_GET['c_id']."'");
	}
    
    if($_SESSION['sess_accesslevel'] < 0)
    {
    	header_location($cfg['path']['url_upgrade'] . '?id=' . $_SESSION['sess_id']);
    }
    elseif(trim($_GET['redirect']) != '')
    {
    	if($_GET['u_id'] == 'Y'){
    		header_location("mem_emailoptions.php?msg=" . urlencode("Your Preferences have been updated"));
    	}else{
    		header_location($_GET['redirect']);
    	}
    }
    else
    {
    	header_location();
    }
}
else 
{
	header_location($cfg['path']['url_site']);
}

include ("./includes/" . "require" . "/" . "site_foot.php");
?>