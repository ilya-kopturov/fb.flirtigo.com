<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0, 1);


/* ... form submit ... */
if(isset($_POST['submit_x']) AND $_POST['submit_x'] != ''){
	$msg = edit_profile($db, $_POST);
	
	if($msg){
		$error = $msg;
	} else {
		$smarty->assign("msg", 'Your Profile adjustments have been submitted and on approval will appear shortly on the site!');
	}
	
	$smarty->assign("editprofile_values", $_POST);
}
/* ..end form submit.. */


/* ... sql ... */
$user = $db->get_row("SELECT * FROM `tblUsers` WHERE `id` = '" . $_SESSION['sess_id'] . "' LIMIT 1");
/* ..end sql.. */


/* ... assign ... */


$smarty->assign("user", $user);

$smarty->assign("age_array",     age_array($user['birthdate']));
$smarty->assign("p_age_array",     age_array($user['p_birthdate']));
$smarty->assign("looking_array", looking_array($user['looking']));
$smarty->assign("forr_array",     forr_array($user['for']));
$smarty->assign("sexualactivities_array", sexualactivities_array($user['sexualactivities']));

$smarty->assign("error", $error);
/*.. end assign ..*/


/* ... smarty ... */
$smarty->register_function('age', 'smarty_age');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "editprofile.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('age');
/* ..end smarty..*/


include ("./includes/" . "require" . "/" . "site_foot.php");
?>