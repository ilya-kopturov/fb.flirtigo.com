<?php
/* $Id: ajax_hot-block.php 340 2008-05-20 17:07:04Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

if($_POST['txt']){
	$subject = "Rules 2257";
	$message = addslashes($_POST['txt']);

	@mail("sales@w2interactive.com",$subject,$message);
	
	echo "alert('Saved.');";
}else{
	echo "alert('Please enter your name and address.');";
}
?>