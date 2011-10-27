<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

/* ... form submit ... */
if(isset($_POST['submit_x']) or isset($_POST['submit_y']))
{
	$id_prof = @$db->get_var("SELECT `screenname` FROM `tblUsers` WHERE `id` = '" . (int) $_GET['id'] . "' LIMIT 1");
	
	if(trim($id_prof))
	{
		if(strtolower($_POST['emailprofile_code']) == strtolower($_SESSION['active_code']))
		{
			$message = @$db->get_var("SELECT `message` FROM `tblMailerMachine` WHERE `for` = 'emailprofile' AND `type` = 'external'");
			$subject = @$db->get_var("SELECT `subject` FROM `tblMailerMachine` WHERE `for` = 'emailprofile' AND `type` = 'external'");
			
			$message = str_replace(array('[%emailprofile_profile%]',
	    		                         '[%emailprofile_name%]',
	        		                     '[%emailprofile_link%]',
	        		                     '[%friend_message%]'),
	            		           array(id_to_screenname( (int) $_GET['id']), 
	                		             $_POST['friend_name'],
	                    		         $cfg['path']['url_site'] . "profileid.php?profile=" . (int) $_GET['id'],
	                    		         $_POST['friend_message']), $message);
			
			$subject = str_replace(array('[%emailprofile_profile%]',
	    		                         '[%emailprofile_name%]',
	        		                     '[%emailprofile_link%]',
	        		                     '[%friend_message%]'),
	            		           array($id_prof, 
	                		             $_POST['friend_name'],
	                    		         $cfg['path']['url_site'] . "profileid.php?id=" . (int) $_GET['id'],
	                    		         $_POST['friend_message']), $subject);
			
			$from_array = $db->get_row("SELECT * FROM `tblUsers` WHERE `id` = '" . $_SESSION['sess_id'] . "' LIMIT 1");
			
    		$subject = replace_before_send($subject, $to_array, $from_array);
    		$message = replace_before_send($message, $to_array, $from_array);
    		
    		if(eregi("^[a-z0-9\._-]+@+[a-z0-9\._-]+\.+[a-z]{2,3}$", $_POST['friend_email']))
    		{
				send_mail($_POST['friend_email'], $_POST['friend_name'], $subject, $message);
    		
				$msg = "Your friend has been notified to view '" . $id_prof . "' profile!";
				
				@$db->query("INSERT INTO `tblFriendEmail` (`from_id`, `check_id`, `to_email`, `date`) VALUES ('".$_SESSION['sess_id']."','".$_GET['id']."','".$_POST['friend_email']."',NOW())");
			}
			else
			{
				$error = "Please enter a valid Email Address." . $_POST['friend_email'];
			}
		}
		else
		{
			$error = "Security code you typed was wrong, try again!";
		}
	}
	else
	{
		$error = "Unknown Profile!";
	}
}
/* ..end form submit.. */

/* ... code verification ... */
$_SESSION["active_code"] = verify(6);
/* ..end code verification.. */

/* ... assign ... */
$smarty->assign('msg', $msg);
$smarty->assign('error', $error);

$smarty->assign('id', (int) $_GET['id']);
/* ..end assign.. */

/* ... smarty ... */
$smarty->register_function('screenname', 'smarty_screenname');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "thisprofile.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('screenname');
/* ..end smarty.. */

include ("./includes/" . "require" . "/" . "site_foot.php");
?>