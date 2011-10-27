<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

$nr_rows  = $db->query("SELECT `id` FROM `tblCampaignMails` WHERE `campaignid` = '". (int) $_GET['c_id']."' AND 
                                                                  `toemail` = '" . urldecode($_GET['email'])."' AND 
                                                                  `sent` = 'Y' AND `readed` = 'N'");

if($nr_rows > 0){
	@$db->query("UPDATE `tblCampaignMails` SET `readed` = 'Y', `dateviewed` = NOW() WHERE `campaignid` = '". (int) $_GET['c_id']."' AND 
                                                                          `toemail` = '" . urldecode($_GET['email'])."' AND 
                                                                          `sent` = 'Y' AND `readed` = 'N'");
	@$db->query("UPDATE `tblCampaign` SET `readed` = `readed` + 1 WHERE `id` = '". (int) $_GET['c_id']."'");
}

include ("./includes/" . "require" . "/" . "site_foot.php");
?>