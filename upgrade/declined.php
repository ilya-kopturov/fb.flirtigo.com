<?php
define("IN_MAINSITE", TRUE);
include ("../includes/" . "require" . "/" . "site_head.php");
require('form_options.php');

session_start();
if(isset($_GET['id']))
{
    $sql_login = "SELECT `id`, `screenname`, `pass`, `sex`, `typeusr`, `looking`, `rating`, `votes`, `city`, `country`,
                             `state`, `accesslevel`, `hide` FROM `tblUsers` WHERE `id`=".$_GET['id'];

	if($qresult = mysql_query($sql_login . " AND `disabled` = 'N'")){
   		while ($row = mysql_fetch_assoc($qresult)) {
    		$_SESSION["sess_id"]          =  $row['id'];
        	$_SESSION["sess_screenname"]  =  $row['screenname'];
        	$_SESSION["sess_pass"]        =  $row['pass'];
        	$_SESSION["sess_email"]       =  $row['email'];
        	$_SESSION["sess_accesslevel"] =  $row['accesslevel'];
    	}
    }
}

define("IN_MAINSITE", TRUE);
                
?>

<!DOCTYPE HTML PUBLIC "-/W3C/DTD HTML 4.01 Transitional/EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
 <HEAD>
  <TITLE>DECLINED!</TITLE>


  <META HTTP-EQUIV="Content-Language" CONTENT="EN">

  <META NAME="revisit-after" CONTENT="5 days">

  <META NAME="robots" CONTENT="FOLLOW,INDEX">

  <META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

  <LINK REL="STYLESHEET" HREF="css/style.css" TYPE="text/css">

  <LINK REL="SHORTCUT ICON" HREF="images/icon.ico">
  <link rel="stylesheet" type="text/css" href="https://www.flirtigo.com/templates/site/dirtyflirting/login/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://www.flirtigo.com/templates/site/dirtyflirting/public/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://www.flirtigo.com/templates/site/dirtyflirting/login/css/member.css">
	<script type="text/javascript" src="http://www.flirtigo.com/js/jquery.js"></script>
	<script type="text/javascript" src="https://www.flirtigo.com/templates/site/dirtyflirting/login/js/functions.js"></script>

	<script type="text/javascript" src="https://www.flirtigo.com/templates/site/dirtyflirting/login/js/rounded_corners_lite.inc.js"></script>

	
<link rel="stylesheet" type="text/css" href="/js/jqModal.css">
<link rel="stylesheet" type="text/css" href="/tabs3/ui.tabs.css">
<link rel="stylesheet" type="text/css" href="/swfupload/default.css">
<link rel="stylesheet" type="text/css" href="/jqgrid/themes/coffe/grid.css">

<script type="text/javascript" src="/js/hb.jgz"></script>

  <style type="text/css">
<!--
.style2 {font-family: Arial, Helvetica, sans-serif}
.style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FF0000;
}
.style4 {font-size: small}
-->
  </style>
</HEAD>

 <BODY onload=setTimeout("location.href='http://www.flirtigo.com/index.php",10000) background="images/background.gif">
 <table class="center header">
     <tr>
       <td class="h_pic">
       	<a href="http://www.flirtigo.com/mem_index.php"/><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_header.gif" border="0" width="369" height="79"></a>
       </td>
       <td style="vertical-align: bottom; text-align: right;" class="logout">

         [ <i>mari123</i> | <a href="http://www.flirtigo.com/mem_logout.php" class="logout">Logout</a> ] <img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_loginitem.jpg" border="0" alt="FlirtiGo.com" align="absmiddle" />
       </td>
     </tr>
   </table>
  <table class="center">

    <tr>
      <td class="menu menu_text">
        <table cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 6px;"><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_bgleftmenu.gif"></td>
            <td class="menu_item" style="width: 55px;">
              <a class="menu_link" href="http://www.flirtigo.com/mem_index.php">Home</a>
            </td>

            <td style="width: 2px;"><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 65px;">
              <a class="menu_link" href="http://www.flirtigo.com/mem_searchbasic.php">Search</a>
            </td>
            <td style="width: 2px;"><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 110px;">
              <a class="menu_link" href="http://www.flirtigo.com/mem_mail.php">Messages: <span id="mail_messages_count">35</span></a>

            </td>
            <td style="width: 2px;"><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 72px;">
              <a class="menu_link" href="http://www.flirtigo.com/mem_browse.php">Browse</a>
            </td>
            <td style="width: 2px;"><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 100px;">
              <a class="menu_link" href="http://www.flirtigo.com/mem_who.php">Online Now</a>

            </td>
            <td style="width: 2px;"><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 102px;">
              <a class="menu_link" href="http://www.flirtigo.com/mem_mostwanted.php#Most_Viewed">New Faces</a>
            </td>
            <td style="width: 2px;"><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 93px;">
              <a class="menu_link" href="http://www.flirtigo.com/mem_myprofile.php">My Profile</a>

            </td>
            <td style="width: 2px;"><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 62px;">
              <a class="menu_link" href="http://www.flirtigo.com/mem_cams.php">Cams</a>
            </td>
            <td style="width: 2px;"><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 60px;">
              <a class="menu_link" href="http://www.flirtigo.com/mem_bonus.php">Bonus</a>

            </td>
            <td style="width: 6px;"><img src="https://www.flirtigo.com/templates/site/dirtyflirting/login/images/hornybook_bgrightmenu.gif"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
 <div id="error_alert1">
   <p class="style3">DECLINED!</p>
		             <p class="style2">Your transaction was declined. Please try later!<br><br>
					 Please contact the <b>Support Team </b> if there is a problem or we can be of any assistance. </p>
   </table>
   <div class="clear"><img src="https://www.flirtigo.com/images/pixel.gif" height="10"></div>
</div>
 <table class="center" id="upgrade">
 	<tr>
 		<td align="center">
 			<img border="1" style="border-color: rgb(255, 255, 255);" src="images/upoptions.gif">
 		</td>
 	</tr>
 </table>
 <div class="clear">
<table class="center" cellpadding="0" cellspacing="0" border="0">

	<tr>
		<td style="width: 6px;"><img src="images/hornybook_bgleftmenu.gif" border="0"></td>
		<td style="width: 734px; text-align: center; background-image: url('images/hornybook_bgmenu.gif'); background-repeat: repeat-x;"><a href="http://support.flirtigo.com/" class="menu_link" style="font-size: 14px; color: white;" target="_blank">Member Support</a></td>
		<td style="width: 6px;"><img src="images/hornybook_bgrightmenu.gif" border="0"></td>
	</tr>
	<tr>
		<td align="center" colspan="3" class="footer" style="padding: 5px 0px 10px 0px;"> 
			<a href="javascript: window.open('http://www.flirtigo.com/terms.php', 'help', 'toolbar=no,location=no,directories=no,status=yes,menubar=no,resizable=yes,copyhistory=no,scrollbars=yes'); void(0);" class="footer">Terms & Conditions</a> |
			<a href="javascript: window.open('http://www.flirtigo.com/usc18.php', 'help', 'toolbar=no,location=no,directories=no,status=yes,menubar=no,resizable=yes,copyhistory=no,scrollbars=yes'); void(0);" class="footer">18 U.S.C. 2257 Record Keeping Requirements Compliance Statement</a> |
			<span class="footer">Copyright 2010</span>

		</td>
	</tr>
		<tr>
		<td align="center" colspan="3" class="footer" style="padding: 5px 0px 10px 0px;"><img src='/images/support-address.gif' /></td>
	</tr>
	 </table>
 </div>
 
 </BODY>
 </HTML>