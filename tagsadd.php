<?php
/* DIRTYFLIRTING.COM  */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

$selectFemale = mysql_query("SELECT `id`, `city`, `state`, `country` FROM `tblUsers` WHERE `sex` = 1");

while($arrFemale = mysql_fetch_assoc($selectFemale)){
		
		if($arrFemale['city']){
			if(!mysql_num_rows(mysql_query("SELECT * FROM `tblUserTags` WHERE `user_id` = '".$arrFemale['id']."' AND `value` = '".$arrFemale['city']."'"))){
				mysql_query("INSERT INTO `tblUserTags` (`user_id`,`value`) values ('".$arrFemale['id']."', '".$arrFemale['city']."') ");
				if(! mysql_num_rows(mysql_query("SELECT * FROM `tblTagCount` WHERE `tag` = '".$arrFemale['city']."' ") )){
					mysql_query("INSERT INTO `tblTagCount` (`tag`, `count`) values ('".$arrFemale['city']."', 1)");
				}else{
					mysql_query("UPDATE `tblTagCount` SET `count` = `count` + 1 WHERE `tag` = '".$arrFemale['city']."'");
				}
			}
		}
		
		if($states[$arrFemale['state']]){
			if(!mysql_num_rows(mysql_query("SELECT * FROM `tblUserTags` WHERE `user_id` = '".$arrFemale['id']."' AND `value` = '".$states[$arrFemale['state']]."'"))){
				mysql_query("INSERT INTO `tblUserTags` (`user_id`,`value`) values ('".$arrFemale['id']."', '".$states[$arrFemale['state']]."') ");
				if(! mysql_num_rows(mysql_query("SELECT * FROM `tblTagCount` WHERE `tag` = '".$states[$arrFemale['state']]."' ") )){
					mysql_query("INSERT INTO `tblTagCount` (`tag`, `count`) values ('".$states[$arrFemale['state']]."', 1)");
				}else{
					mysql_query("UPDATE `tblTagCount` SET `count` = `count` + 1 WHERE `tag` = '".$states[$arrFemale['state']]."'");
				}
			}
		}
		
		if($countries[$arrFemale['country']]){
			if(!mysql_num_rows(mysql_query("SELECT * FROM `tblUserTags` WHERE `user_id` = '".$arrFemale['id']."' AND `value` = '".$countries[$arrFemale['country']]."'"))){
				mysql_query("INSERT INTO `tblUserTags` (`user_id`,`value`) values ('".$arrFemale['id']."', '".$countries[$arrFemale['country']]."') ");
				if(! mysql_num_rows(mysql_query("SELECT * FROM `tblTagCount` WHERE `tag` = '".$countries[$arrFemale['country']]."' ") )){
					mysql_query("INSERT INTO `tblTagCount` (`tag`, `count`) values ('".$countries[$arrFemale['country']]."', 1)");
				}else{
					mysql_query("UPDATE `tblTagCount` SET `count` = `count` + 1 WHERE `tag` = '".$countries[$arrFemale['country']]."'");
				}
			}
		}
}

echo "DONE";

include ("./includes/" . "require" . "/" . "site_foot.php");
?>
