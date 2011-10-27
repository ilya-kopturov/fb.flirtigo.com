<?
/* HOOKUPHOTEL.COM                                                                        */

function mailermachine($db,$allow_email,$for,$type,$to_id,$from_id,$msgreal)
{
	global $cfg, $whisper_id, $whisper_details;
	
	$to_array   = $db->get_row("SELECT * FROM `tblUsers` WHERE `id` = '" . $to_id   . "' LIMIT 1");
	$from_array = $db->get_row("SELECT * FROM `tblUsers` WHERE `id` = '" . $from_id . "' LIMIT 1");
	
	$mail = $db->get_row("SELECT `subject`,`message` FROM `tblMailerMachine` WHERE `for` = '".$for."' AND `type` = '".$type."'");
	if($mail['subject']!="" && $mail['message']!=""){
    	$subject = replace_before_send($mail['subject'], $to_array, $from_array);
    	$message = replace_before_send($mail['message'], $to_array, $from_array);

    
    	if($to_array['accesslevel']=='0') $msgreal=substr($msgreal,0,8)."............[login to read more]";
    
    	$message = str_replace("[%whisper_details%]",$whisper_details, $message);
    
	
		if($type == 'external' && ($to_array[$allow_email] == "Y" or $allow_email == "Y"))
		{
			//$mkey=md5(date("YmdHis").$to_id.$from_id);	
		
			//@mysql_query("insert into tblReplyids (`to`,`toemail`,`from`,`mkey`,`insdate`,`type`) values ('$to_id','".$to_array['email']."','$from_id','$mkey',NOW(),'site')");
		
			send_mail($to_array['email'], $to_array['screenname'], $subject, $message,$mkey );
		
		}
		elseif($type == 'internal')
		{
			$into_table = "tblMails";
		
			if($for == 'new_whisper') $e_type = 'F'; else $e_type = 'E';
		
			if($for == 'new_whisper' && $to_array['typeusr'] == "Y") { $into_table = "tblTypeWhispers"; $message = $whisper_id;}
		
		
			@$db->query("INSERT INTO `". $into_table ."` ( `user_id`, 
			                                           `user_from`, 
			                                           `user_to`, 
			                                           `subject`, 
			                                           `message`, 
			                                           `type`, 
			                                           `date_sent`
			                                          ) 
			                                  VALUES ( '" . $to_id . "', 
			                                           '" . $from_id . "', 
			                                           '" . $to_id . "', 
			                                           '" . addslashes( $subject ) . "', 
			                                           '" . addslashes( $message ) . "', 
			                                           '" . $e_type . "',
			                                           NOW()
			                                          )");
		}
	}
}

function sent_message_reply($db, $to, $from, $subject, $message, $savemail)
{
	global $c_reply, $cfg;
	
	$subject_real = $subject;
	$message_real = $message;
	
	$subject = bannedwords("P", $subject);
	$message = bannedwords("P", $message);
	
	$to_id = @$db->get_row("SELECT `id`, `typeusr`, `redirect` 
	                        FROM   `tblUsers` 
	                        WHERE  `id` = '" . $to . "' AND `disabled` = 'N' LIMIT 1");

	$fromaccess = @$db->get_row("SELECT `id`, `accesslevel` 
	                        FROM   `tblUsers` 
	                        WHERE  `id` = '" . $from . "' AND `disabled` = 'N' LIMIT 1");	                        
	
	$into_table = $to_id['typeusr'] == 'Y'?($to_id['redirect'] == 'Y'?'tblTypeMails':'tblMails'):'tblMails';
	
	if($to_id['id'] > 0){
		$is_block = @$db->query("SELECT `type` FROM `tblHotBlockList` 
		                                       WHERE `user_id` = '" . $to_id['id'] . "' AND 
		                                             `friend_user_id` = '" . $from. "' AND 
		                                             `type` = 'B' 
		                                       LIMIT 1");
		if(!$is_block){
			$is_first  = @$db->get_var("SELECT COUNT(*) 
			                            FROM   `" . $into_table . "` 
			                            WHERE  `user_from` = '" . $from . "'");
			if( (int) $is_first > 0){
				$c_reply = null;
			}
			$sqlmail="INSERT INTO `". $into_table ."` (`user_id`,`user_from`,`user_to`,`subject`,`message`,`c_id`,`date_sent`) 
			                                       VALUES    ('" . $to_id['id'] . "','" . $from . "','" . $to_id['id'] . "','" . addslashes( $subject ) . "','" . addslashes( $message ) . "','" . (int) $c_reply . "',NOW())";
		
				
			
			////// PUT IN OUTBOX THE MAIL REPLY //////////////
			$sqlmail2="INSERT INTO `". $into_table ."` (`user_id`,`user_from`,`user_to`,`subject`,`message`,`folder`,`c_id`,`date_sent`) 
			                                       VALUES    ('" . $from . "','" . $from . "','" . $to_id['id'] . "','" . addslashes( $subject ) . "','" . addslashes( $message ) . "','2','" . (int) $c_reply . "',NOW())";
			
			///////////////////////////////////////////////// 
			$send_mail = @$db->query($sqlmail);
			$id_to_id  = mysql_insert_id();
			
			@$db->query($sqlmail2);
			
			mail("chris@w2interactive.com","sql",$sqlmail);
			
		
			
			if(!$send_mail){
				return "Unknown error, message was not sent.";
			} elseif($to_id['typeusr'] == 'Y') {
				$real_update = @$db->query("UPDATE `tblUsers` SET `mailresponded` = 'Y' WHERE `mailresponded` = 'N' AND `id` = '" . $from . "' LIMIT 1");
				
				if($real_update > 0){
					@$db->query("UPDATE `tblTypeMails` SET `urgent` = 'Y' WHERE `id` = '" . $id_to_id ."'");
				}
				$sqlmail3="UPDATE `tblTypeMails` SET `new` = 'N' WHERE `user_id` = '" . $to_id['id'] ."' AND 
				                                                         `user_from` = '" . $from . "' AND 
				                                                         `operator_id` = '0' AND 
				                                                         `folder` = '1' AND 
				                                                         `id` != '" . $id_to_id . "'";
				@$db->query($sqlmail3);                                             
				                                                         
			    mail("chris@w2interactive.com","sql",$sqlmail3);				                                                         
			}
			
			if($savemail == 1){
			
				$save_mail = @$db->query("INSERT INTO `tblMails` (`id_to_id`,`user_id`,`user_from`,`user_to`,`subject`,`message`,`folder`,`date_sent`) 
			                                           VALUES    ('" . $id_to_id . "','" . $from . "','" . $from . "','" . $to_id['id'] . "','" . addslashes( $subject_real ) . "','" . addslashes( $message_real ) . "','2',NOW())");
			}
			
			if($fromaccess['accesslevel']=='0') 
					mailermachine($db,'emailnotif','freereply','external',$from,$from, $message);
				   else mailermachine($db,'emailnotif','new_message','external',$to_id['id'],$from, $message);
		}
	} else {
		return "User was not found in our database!";
	}
}



function sent_message($db, $to, $subject, $message, $savemail, $reply_on = null)
{
	global $c_reply, $cfg;
	
	$subject_real = $subject;
	$message_real = $message;
	
	$subject = bannedwords("P", $subject);
	$message = bannedwords("P", $message);
	
	$to_id = @$db->get_row("SELECT `id`, `typeusr`, `redirect` 
	                        FROM   `tblUsers` 
	                        WHERE  `id` = '" . $to . "' AND `disabled` = 'N' LIMIT 1");
	
	$into_table = $to_id['typeusr'] == 'Y'?($to_id['redirect'] == 'Y'?'tblTypeMails':'tblMails'):'tblMails';
	
	
		
	
	if($to_id['id'] > 0){
		
		$isblocksql="SELECT `type` FROM `tblHotBlockList` 
		                                       WHERE `user_id` = '" . $to_id['id'] . "' AND 
		                                             `friend_user_id` = '" . $_SESSION['sess_id']. "' AND 
		                                             `type` = 'B' 
		                                       LIMIT 1";
		$is_block = @$db->get_row($isblocksql);
		
		
		if(!$is_block)
		{
		
			$is_first  = @$db->get_var("SELECT COUNT(*) 
			                            FROM   `" . $into_table . "` 
			                            WHERE  `user_from` = '" . $_SESSION['sess_id'] . "'");
			
			if( (int) $is_first > 0){
				$c_reply = null;
			}
			
			
			
			$sendmailsql="INSERT INTO `". $into_table ."` (`user_id`,`user_from`,`user_to`,`subject`,`message`,`c_id`,`date_sent`) 
			                                       VALUES    ('" . $to_id['id'] . "','" . $_SESSION['sess_id'] . "','" . $to_id['id'] . "','" . addslashes( $subject ) . "','" . addslashes( $message ) . "','" . (int) $c_reply . "',NOW())";
			                       			
			$send_mail = @$db->query($sendmailsql);               
			$id_to_id  = mysql_insert_id();
			
			if(!$send_mail){
				return "Unknown error, message was not sent.";
			} 
			elseif($to_id['typeusr'] == 'Y') 
			{
			//mail("chris@w2interactive.com","MESSAGE SEND",$into_table." / ".$to_id['typeusr']." / ".$to_id['id']." / ".$message);
				$real_update = @$db->query("UPDATE `tblUsers` SET `mailresponded` = 'Y' WHERE `mailresponded` = 'N' AND `id` = '" . $_SESSION['sess_id'] . "' LIMIT 1");
				
				if($real_update > 0)
				{
					@$db->query("UPDATE `tblTypeMails` SET `urgent` = 'Y' WHERE `id` = '" . $id_to_id ."'");
				}
				@$db->query("UPDATE `tblTypeMails` SET `new` = 'N' WHERE `user_id` = '" . $to_id['id'] ."' AND 
				                                                         `user_from` = '" . $_SESSION['sess_id'] . "' AND 
				                                                         `operator_id` = '0' AND 
				                                                         `folder` = '1' AND 
				                                                         `id` != '" . $id_to_id . "'");
				
				if ($row = $db->get_row("SELECT * FROM tblCampaignMailMatchMail WHERE mail_id = " . (int)$reply_on)) 
				{
					$db->query("UPDATE `tblTypeMails` SET `reply_on_campaign_id` = '{$row['campaign_id']}' WHERE `id` = '" . $id_to_id ."'");
				}
			}
			
			
				
			
			if($savemail == 1)
			{	
			$savesql="INSERT INTO `tblMails` (`id_to_id`,`user_id`,`user_from`,`user_to`,`subject`,`message`,`folder`,`date_sent`) 
			                                           VALUES    ('" . $id_to_id . "','" . $_SESSION['sess_id'] . "','" . $_SESSION['sess_id'] . "','" . $to_id['id'] . "','" . addslashes( $subject_real ) . "','" . addslashes( $message_real ) . "','2',NOW())";
			        
			$save_mail = @$db->query($savesql);
			}
			
			
		
			
			mailermachine($db,'emailnotif','new_message','external',$to_id['id'],$_SESSION['sess_id'],$message);
		}
	} else {
		return "User was not found in our database!";
	}
}

function replace_before_send($replacestring, $to_array, $from_array)
{
        global $cfg, $campaignmail_id, $masswhispers_id, $redirect_to, $message;

        $to_name   = ucfirst($to_array['screenname']);
        $to_user_email=$to_array['email'];
        $from_name = ucfirst($from_array['screenname']);

        $to_countryname = @mysql_fetch_array(mysql_query("SELECT `name` FROM `tblCountries` WHERE `id` = '" . $to_array['country'] . "'"));
        $to_statename   = @mysql_fetch_array(mysql_query("SELECT `name` FROM `tblStates` WHERE `id` = '" . $to_array['state'] . "'"));

//        $to_countryname = @mysql_fetch_array(mysql_query("SELECT `country_title` FROM `geo_country` WHERE `country_id` = '" . $to_array['country'] . "'"));
  //      $to_statename   = @mysql_fetch_array(mysql_query("SELECT `state_title` FROM `geo_state` WHERE `state_id` = '" . $to_array['state'] . "'"));

        if($to_countryname['name'] != '') $to_location = $to_countryname['name'];
        if($to_statename['name'] != '' and $to_location != '') {$to_location .= ", " . $to_statename['name'];}
        elseif($to_statename['name'] != ''){ $to_location = $to_statename['name']; }


        $sqlsql=mysql_query("SELECT `id` FROM `tblUsers` WHERE `id` = '" . $from_array['id'] . "' AND `typeusr` = 'Y' AND `typeloc` = 'Y' LIMIT 1");

        $type_usr_loc = @mysql_num_rows($sqlsql);

//  syslog(LOG_INFO, var_export( $type_usr_loc, true));

        if((int) $type_usr_loc > 0)
        {
                list($joined) = @mysql_fetch_array(mysql_query("SELECT `joined`
                                                                FROM `tblUsers`
                                                                WHERE `id` = '" . $from_array['id'] . "'
                                                                LIMIT 1"));

                list($ret['sess_country'],
                     $ret['sess_state'],
                     $ret['sess_city']) = @mysql_fetch_array
                                                        (
                                           mysql_query("SELECT `country`,`state`,`city`
                                                                    FROM `tblLocations`
                                                        WHERE  `user_id`   = '".$to_array['id']."' AND
                                                               `fromdate` <=  '".$joined."'         AND
                                                               `todate`   >   '".$joined."'
                                                        LIMIT 1"
                                                      )
                                         );

                if(!$ret['sess_country']) $ret['sess_country'] = $to_array['country'];
                if($ret['sess_country'] != 1) $ret['sess_state'] = 0; elseif (!$ret['sess_state'])
                                         $ret['sess_state']=$to_array['state'];

//        syslog(LOG_INFO, var_export( $ret['sess_country'], true));
  //      syslog(LOG_INFO, var_export( $ret['sess_state'], true));
if((int) $ret['sess_state']==0) $ret['sess_state']= $from_array['state'];


                if((int) $ret['sess_country'] > 0){
                        $from_countryname = @mysql_fetch_array
                                                (
                                                 mysql_query("SELECT `name`
                                                               FROM `tblCountries`
                                                               WHERE `id` = '" . $ret['sess_country'] . "'"
                                                              )
                                                );


                        $from_statename   = @mysql_fetch_array
                                                (
                                                  mysql_query("SELECT `name`
                                                               FROM `tblStates`
                                                               WHERE `id` = '" . $ret['sess_state'] . "'"
                                                             )
                                                );

                        if($from_countryname['name'] != '') $from_location = $from_countryname['name'];
                        if($from_statename['name'] != '' and $from_location != '') {$from_location .= ", " . $from_statename['name'];}
                        elseif($from_statename['name'] != ''){ $from_location = $from_statename['name']; }

//                         syslog(LOG_INFO, var_export( $from_location, true));

                }else{
//                 syslog(LOG_INFO, var_export( $from_location, true));
                     if ($to_location == '') {
                    $from_countryname = @mysql_fetch_array(mysql_query("SELECT `name` FROM `tblCountries` WHERE `id` = '" . $from_array['country'] . "'"));
                    $from_statename   = @mysql_fetch_array(mysql_query("SELECT `name` FROM `tblStates` WHERE `id` = '" . $from_array['state'] . "'"));

                    //$from_countryname = @mysql_fetch_array(mysql_query("SELECT `country_title` FROM `geo_country` WHERE `country_id` = '" . $from_array['country'] . "'"));
                    //$from_statename   = @mysql_fetch_array(mysql_query("SELECT `state_title` FROM `geo_state` WHERE `state_id` = '" . $from_array['state'] . "'"));


                    if($from_countryname['name'] != '') $from_location = $from_countryname['name'];
                    if($from_statename['name'] != '' and $from_location != '') {$from_location .= ", " . $from_statename['name'];}
                    elseif($from_statename['name'] != ''){ $from_location = $from_statename['name']; }
			if ($from_location=='') $from_location='N/A';
                                        } else
                     $from_location = $to_location;


                }


        }else{

                $from_countryname = @mysql_fetch_array(mysql_query("SELECT `name` FROM `tblCountries` WHERE `id` = '" . $from_array['country'] . "'"));
                $from_statename   = @mysql_fetch_array(mysql_query("SELECT `name` FROM `tblStates` WHERE `id` = '" . $from_array['state'] . "'"));

//                $from_countryname = @mysql_fetch_array(mysql_query("SELECT `country_title` FROM `geo_country` WHERE `country_id` = '" . $from_array['country'] . "'"));
//                $from_statename   = @mysql_fetch_array(mysql_query("SELECT `state_title` FROM `geo_state` WHERE `state_id` = '" . $from_array['state'] . "'"));


                if($from_countryname['name'] != '') $from_location = $from_countryname['name'];
                if($from_statename['name'] != '' and $from_location != '') {$from_location .= ", " . $from_statename['name'];}
                elseif($from_statename['name'] != ''){ $from_location = $from_statename['name']; }
//              syslog(LOG_INFO, var_export( $from_location, true));

        }



//      if ($from_location == '')
        $to_imagelink   = "<img src='" . $cfg['path']['url_site'] . "showphoto.php?id=" . $to_array['id'] . "&m=Y&t=s&p=1&a=Y'>";
        $from_imagelink = "<img src='" . $cfg['path']['url_site'] . "showphoto.php?id=" . $from_array['id'] . "&m=Y&t=s&p=1&a=Y'>";

        $to_videolink   = "<img src='" . $cfg['path']['url_site'] . "showvideo.php?id=" . $to_array['id'] . "&m=Y&t=s&p=1&a=Y'>";
        $from_videolink = "<img src='" . $cfg['path']['url_site'] . "showvideo.php?id=" . $from_array['id'] . "&m=Y&t=s&p=1&a=Y'>";

        $hidden_image   = "<img height='0' witdh='0' src='" . $cfg['path']['url_site'] . "hiddenimage.php?email=" . urlencode($to_array['email']) . "&c_id=" . $campaignmail_id . "&mw_id=" . $masswhispers_id . "'>";

        $to_pass = @mysql_fetch_array(mysql_query("SELECT `pass` FROM `tblUsers` WHERE `id` = '" . $to_array['id'] . "' LIMIT 1"));
        $to_password = trim($to_pass['pass']);

        $login = trim($to_array['screenname']) . "|" . trim($to_array['pass']);
        $login = md5($login);

        $login_link = $cfg['path']['url_site'] . "emaillogin.php?e_id=" . $to_array['id'] . "&c_id=" . $campaignmail_id . "&redirect=" . urlencode($redirect_to) . "&login=" . urlencode($login);

        $unsubscribe_link = $cfg['path']['url_site'] . "emaillogin.php?e_id=" . $to_array['id'] . "&c_id=" . $campaignmail_id . "&redirect=mem_emailoptions.php&login=" . urlencode($login) . "&u_id=Y";

        $internalprofile_link = $cfg['path']['url_site'] . "mem_profile.php?id=" . $to_array['id'];
        $externalprofile_link = $cfg['path']['url_site'] . "profileid.php?profile=" . $to_array['id'];

	
	$replacestring = str_replace(array('[%to_name%]',
	                                   '[%from_name%]',
	                                   '[%to_location%]',
	                                   '[%from_location%]',
	                                   '[%to_imagelink%]',
	                                   '[%from_imagelink%]',
	                                   '[%to_videolink%]',
	                                   '[%from_videolink%]',
	                                   '[%hidden_image%]',
	                                   '[%login_link%]',
	                                   '[%unsubscribe_link%]',
	                                   '[%internalprofile_link%]',
	                                   '[%externalprofile_link%]',
	                                   '[%to_password%]',
	                                   '[%whisper_message%]',
										'[%to_user_email%]'),
	                             array($to_name,
	                                   $from_name,
	                                   $to_location,
	                                   $from_location,
	                                   $to_imagelink,
	                                   $from_imagelink,
	                                   $to_videolink,
	                                   $from_videolink,
	                                   $hidden_image,
	                                   $login_link,
	                                   $unsubscribe_link,
	                                   $internalprofile_link,
	                                   $externalprofile_link,
	                                   $to_password,
	                                   $message,
	                                   $to_user_email),$replacestring);
	
	return $replacestring;
}

function send_mail($to_email, $to_name, $subject, $message, $mkey)
{
	$mail          = new PHPMailer();
	
	$mail->Body    = $message;
	
	$mail->Subject = stripslashes($subject);
	                                
	//$mail->AddReplyTo("190386280582.".$mkey."@hookuphotel.com","HookupHotel");
	
	$mail->FromName = 'FlirtiGo';
	$mail->From = 'noreply@flirtigo.com';
	$mail->Hostname = 'mail.flirtigo.com';
//	$mail->Host     = 'mail.flirtigo.com';
	$mail->Sender   = 'noreply@flirtigo.com';
	$mail->Helo     = 'mail.flirtigo.com';

        $mail->Host     = 'mail.flirtigo.com';
        $mail->Port     = "2525";
       $mail->Mailer   = "smtp";
	
	                                       
	/*
	$mail->Host     = "174.120.93.75";
	$mail->Port     = "25";
	$mail->Mailer   = "smtp";
	*/
	
	$mail->IsQmail;
	$mail->AddAddress($to_email,$to_name);
	                                                                        
	
	
	
	if($mail->send())
	{
		$mail->ClearAddresses();
		
		return true;
	}
	
	return false;
}
?>
