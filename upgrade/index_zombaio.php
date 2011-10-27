<?php 
$include_dir = "/home/httpd/vhosts/flirtigo.com/html";

include_once( $include_dir . "/includes/config/" . "db.php" );
include_once( $include_dir . "/includes/config/" . "path.php" );
include_once( $include_dir . "/includes/config/" . "profile.php" );
include_once( $include_dir . "/includes/config/" . "option.php" );
include_once($include_dir . "/includes/function/" . "general.php");
include_once($include_dir . "/includes/function/" . "smarty.php");

include_once( $cfg['path']['dir_include'] . "class"  . "/" . "db.php" );
//require('config.php');                                                                                                                                       require('form_options.php');
require('form_options.php');
$db = new db( $cfg['db']['user'], 
              $cfg['db']['password'], 
              $cfg['db']['db'], 
              $cfg['db']['host']
            );
session_start();
if(isset($_GET['id']))
{
    $sql_login = "SELECT `id`, `screenname`, `pass`, `email`, `sex`, `typeusr`, `looking`, `rating`, `votes`, `city`, `country`,
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

list($countrycode) = @mysql_fetch_row( mysql_query('SELECT c.iso_code_2
                                                    FROM ip2nationCountries c, ip2nation i
                                                    WHERE i.ip < INET_ATON("'.$_SERVER['REMOTE_ADDR'].'") AND c.code = i.country
                                                        ORDER BY i.ip DESC
                                                        LIMIT 0,1'
                                                      )
                                          );

if(isset($_POST['submiter'])){

	$error='';
	if($_POST['client_fname']=='') $error .='First name field cannot be empty<br>';
	if($_POST['client_lname']=='') $error .='Last name field cannot be empty<br>';
	if($_POST['client_address']=='') $error .='Address field cannot be empty<br>';
	if($_POST['client_zip']=='') $error .='ZIP/Postal field cannot be empty<br>';
	if($_POST['client_city']=='') $error .='City field cannot be empty<br>';
	if(!$_POST['client_state'] && ($_POST['client_country'] == 'US' || !$_POST['client_country'])) {
                $error .='Please select the State<br>';
        }
        if(!$_POST['client_zip'] && ( $_POST['client_country'] == 'US' || !$_POST['client_country'])) {
                $error .='ZIP/Postal field cannot be empty<br>';
        }
        if(!$_POST['client_country']) {
                $error .='Please check the Country<br>';
	}
	
	$sqln = mysql_query("select * from tblUsers where id = '".$_SESSION['sess_id']."'");
        $ubn = @mysql_num_rows($sqln);
        if($ubn==0) $error="Invalid user";
                else $obj=mysql_fetch_object($sqln);

    if($error==''){

    	$_SESSION['client_fname'] = $_POST['client_fname'];
    	$_SESSION['client_lname'] = $_POST['client_lname'];
    	$_SESSION['client_address'] = $_POST['client_address'];
    	$_SESSION['client_zip'] = $_POST['client_zip'];
    	$_SESSION['client_amount'] = $_POST['client_amount'];
    	$_SESSION['client_currency'] = $client_currency;
    	$_SESSION['client_city'] = $_POST['client_city']; 
    	$_SESSION['client_state'] = $_POST['client_state'];
    	$_SESSION['client_country'] = $_POST['client_country'];
    	
    	if($_POST['client_amount']=='29.95' and $client_currency=='USD'){header("Location: https://secure.zombaio.com/get_proxy.asp?SiteID=287651487&PricingID=1167555&return_url_approve=http://www.flirtigo.com/upgrade/approved.php&return_url_decline=http://www.flirtigo.com/upgrade/declined.php&Username=".$_SESSION['sess_screenname']."&Password=".$_SESSION['sess_pass']."&Email=".$_SESSION['sess_email']."&FirstName=".$_SESSION['client_fname']."&LastName=".$_SESSION['client_lname']."&Address=".$_SESSION['client_address']."&Postal=".$_SESSION['client_zip']."&Region=".$_SESSION['client_state']."&City=".$_SESSION['client_city']."&Country=".$_SESSION['client_country']);}

        if($_POST['client_amount']=='59.75' and $client_currency=='USD'){header("Location: https://secure.zombaio.com/get_proxy.asp/SiteID=287651487&PricingID=1168521&return_url_approve=http://www.flirtigo.com/upgrade/approved.php&return_url_decline=http://www.flirtigo.com/upgrade/declined.php&Username=".$_SESSION['sess_screenname']."&Password=".$_SESSION['sess_pass']."&Email=".$_SESSION['sess_email']."&FirstName=".$_SESSION['client_fname']."&LastName=".$_SESSION['client_lname']."&Address=".$_SESSION['client_address']."&Postal=".$_SESSION['client_zip']."&Region=".$_SESSION['client_state']."&City=".$_SESSION['client_city']."&Country=".$_SESSION['client_country']);}

      	if($_POST['client_amount']=='89.75' and $client_currency=='USD'){header("Location: https://secure.zombaio.com/get_proxy.asp?SiteID=287651487&PricingID=1168563&return_url_approve=http://www.flirtigo.com/upgrade/approved.php&return_url_decline=http://www.flirtigo.com/upgrade/declined.php&Username=".$_SESSION['sess_screenname']."&Password=".$_SESSION['sess_pass']."&Email=".$_SESSION['sess_email']."&FirstName=".$_SESSION['client_fname']."&LastName=".$_SESSION['client_lname']."&Address=".$_SESSION['client_address']."&Postal=".$_SESSION['client_zip']."&Region=".$_SESSION['client_state']."&City=".$_SESSION['client_city']."&Country=".$_SESSION['client_country']);}
    	
      	header_location('https://www.flirtigo.com/upgrade/index.php?id='.$_GET['id']);
    }
}

?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<HTML>
 <HEAD>
 <TITLE>FlirtiGo.com - Upgrade Instantly</TITLE>
 <META NAME="robots" CONTENT="NOINDEX,NOFOLLOW">
 <META http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <LINK REL="STYLESHEET" HREF="css/style.css" TYPE="text/css">
 <style type="text/css">
<!--
.style7 {font-size: 12px}
-->
  </style>
 <script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
 </script>
 </HEAD>
 
 <BODY background="images/background.gif">
 
<form name="forma" action="index.php" method="post">
  <input type="hidden" name="step" value="2">
  <input type="hidden" name="submiter" value="1">
   
   <!-- <div style="position:absolute; width:90px; height:48px; z-index:1; left: 920px; top: 190px;"><img src="images/new_girldiv.gif" width="90" height="48"></div> -->
   
   <table width="785" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#000000">
   
     <tr>
       <td align="center" valign="top">
	     <table width="780" height="134" border="0" cellpadding="0" cellspacing="0">
           <tr>
             <td>
               <img border="0" src="images/members_header_flash.jpg" width="780" height="134">
             </td>
           </tr>
         </table>
       </td>
     </tr>

     <tr>
       <td align="center" valign="top">
	   </td>
     </tr>

         <tr>
       <td align="center" valign="top">
         <table width="780" border="0" cellpadding="0" cellspacing="0">
           <tr>
             <td colspan="3"><img src="images/upgrade_top.gif" width="780" height="4"></td>
           </tr>
           <tr>
             <td width="1" background="images/upgrade_leftright.gif"></td>
             <td width="778" height="100" bgcolor="#DAC9B7" style="padding-top: 10px; padding-bottom: 10px;" valign="top" align="center">
             
               
			   
			   
			 <!-- page starts here -->  
			   
			   
			   <table width="750" border="0" cellpadding="0" cellspacing="0">
	             <tr>
	               <td align="left" style="padding-bottom: 10px;"><img src="images/new_upgradenow.gif"></td>
	             </tr>
	             <tr height="2">
	               <td background="images/new_line.gif"></td>
	             </tr>
	             <tr>
	               <td align="center" style="padding-top: 5px;" valign="top">
	                 <table width="750" border="0" cellpadding="0" cellspacing="0">
	                   <tr>
	                     <td width="315" valign="top">
	                       <span align="center" style="font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif;">
	                        <b>You have attempted to access a feature of the site <br>that requires you to upgrade your membership...</b>
	                       </span>
	                       <br><br>
	                       <span align="center" style="font-size: 19px; font-face: 'Tahoma';">
	                         <b>Your Current Room is a <br>&quot;<font color="red"><?=$cfg['option']['rooms'][$_SESSION['sess_accesslevel']];?></font>&quot;</b>
	                       </span>
	                       <br><br><br>
	                       <div align="left" style="font-size: 14px; font-family: 'Times New Roman'; font-weight: bold;">
	                         <img src="images/new_1.gif" width="233" height="14">
	                          <br><br>
				  <?if($countrycode!='GB' and $currency!='&euro;') {?>
				  <input name="client_amount" type="radio" value="99.95" >Special: 6 Months '<font color="red">Luxury Suite</font>'<br> Upgrade just $99.95 (Thats 3 Months FREE!)
	                          <br><br><?}?>
	                         <input name="client_amount" type="radio" <?if($countrycode=='GB' or $currency=='&euro;') echo "value=\"49.95\"";else echo "value=\"69.95\"";?> >3 Months '<font color="red">Luxury Suite</font>' Upgrade just <?=$currency?><?if($countrycode=='GB' or $currency=='&euro;') echo "49.95";else echo "69.95";?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Thats 1 Month FREE!)
	                          <br><br>
	                         <input name="client_amount" type="radio" checked <?if($countrycode=='GB' or $currency=='&euro;') echo "value=\"24.95\"";else echo "value=\"34.95\"";?> >1 Month '<font color="red">Luxury Suite</font>' Upgrade <?=$currency?><?if($countrycode=='GB' or $currency=='&euro;') echo "24.95";else echo "34.95";?>/month
				  <?if($countrycode!='GB' and $currency!='&euro;') {?>
	                          <br><br>
	                         <input name="client_amount" type="radio" onclick="javascript:if(confirm('Are you SURE? A Luxury Suite Membership enables you to view users own uploaded videos more for just <?echo $currency?>5 more! Click OK to take a Luxury Suite or Cancel to go with a  double.')){document.forma.client_amount[2].checked=true;}else{document.forma.client_amount[3].checked=true;}" <?if($countrycode=='GB') echo "value=\"19.95\"";else echo "value=\"29.95\"";?> >1 Month '<font color="red">Double Room</font>' Upgrade <?=$currency?><?if($countrycode=='GB' or $currency=='&euro;') echo "19.95";else echo "29.95";?>/month
	                          <br><br>
				  <?}else{?>
	                          <br><br>
	                         <input name="client_amount" type="radio" onclick="javascript:if(confirm('Are you SURE? A Luxury Suite Membership enables you to view users uploaded videos more for just <?echo $currency?>5 more! Click OK to take a Luxury Suite or Cancel to go with a  double.')){document.forma.client_amount[1].checked=true;}else{document.forma.client_amount[2].checked=true;}" <?if($countrycode=='GB') echo "value=\"19.95\"";else echo "value=\"29.95\"";?> >1 Month '<font color="red">Double Room</font>' Upgrade <?=$currency?><?if($countrycode=='GB' or $currency=='&euro;') echo "19.95";else echo "29.95";?>/month
                  <?}?>	                         
	                       </div>
	                     </td>
	                     <td width="435" align="right">
	                       <img src="images/new_benefits.gif" width="434" height="273">
	                        <br>
	                     </td>
	                   </tr>
	                   <tr>
	                     <td colspan="2" valign="top" align="left">
	                       <table width="745" cellpadding="0" cellspacing="0" border="0">
	                         <tr>
	                           <td colspan="2">
	                             <img src="images/new_2.gif">
	                           </td>
	                         </tr>
	                         <tr>
	                           <td style="padding-left: 15px;">
	                           
	                           
	                           
                         <table cellpadding="0" cellspacing="0" border="0">
                         <? if(isset($error) and $error != ""){?>
                         <tr>
                           <td colspan="2" align="left" style="padding: 10px 15px 5px 0px;">
                             <font color="red"><?=$error;?></font>
                           </td>
                         </tr>
                         <?}?>
                         <tr >
                           <td colspan="2" align="left" style="padding: 10px 15px 5px 0px;"><span class="style3"><font color="#000000" size="3">Just complete the form below for an instant Upgrade. </font></span></td>
                         </tr>
                         <tr >
                           <td><font color="#000000" size="3">First Name </font></span></td>
                           <td><font color="#000000" size="3">
                             <input name="client_fname"  class="upgrade_input" value="<?if(isset($_POST['client_fname'])) echo $_POST['client_fname'];?>">                           
                             </font></span></td>
                         </tr>
                         <tr>
                           <td><font color="#000000" size="3">Last Name </font></span></td>
                           <td><font color="#000000" size="3">
                             <input name="client_lname"  class="upgrade_input" value="<?if(isset($_POST['client_lname'])) echo $_POST['client_lname'];?>">                           
                             </font></span></td>
                         </tr>
                         <tr >
                           <td><font color="#000000" size="3">Street Address </font></span></td>
                           <td><font color="#000000" size="3">
                             <input name="client_address" class="upgrade_input"  value="<?if(isset($_POST['client_address'])) echo $_POST['client_address'];?>">                           
                             </font></span></td>
                         </tr>
                         <tr >
                           <td><font color="#000000" size="3">City</font></span></td>
                           <td><font color="#000000" size="3">
                             <input name="client_city" class="upgrade_input"  value="<?if(isset($_POST['client_city'])) echo $_POST['client_city'];?>">                           
                             </font></span></td>
                         </tr>
                         <tr >
                           <td><font color="#000000" size="3">State</font></span></td>
                           <td><font color="#000000" size="3">
                         <select id="bill_state" name="client_state">
        <option value="">Choose State</option>
        <?
        foreach($states as $key=>$value) {
                echo "<option value=\"$key\"";
                if($_POST['client_state'] == $key) {
                        echo " selected=\"selected\"";
                }
                echo ">$value</option>\n";
        }
        echo "</select>";
        ?>
     </font></span></td>
                         </tr>
 
			<tr >
                           <td><font color="#000000" size="2">Zip / Postal Code </font></span></td>
                           <td><font color="#000000" size="3">
                             <input name="client_zip" class="upgrade_input"  value="<?if(isset($_POST['client_zip'])) echo $_POST['client_zip'];?>">                           
                             </font></span></td>
                         </tr>
                         <tr >
                           <td><font color="#000000" size="3">Country</font></span></td>
                           <td><font color="#000000" size="3">
                            
				<select id="bill_country" name="client_country">
				        <option value="">Choose Country</option>
        <? foreach($countries as $key=>$value) {
                echo "<option value=\"$key\"";
                if($_POST['client_country'] == $key || $countrycode ==$key) {
                        echo " selected=\"selected\"";
                }
                echo ">$value</option>\n";
        }
        if($_SESSION['sess_id']=4894020){
	//$countrycode=='CA';
}
        echo "</select>";
?>
				</font></span></td>
                         </tr>
                         <tr >
                           <td style="padding: 10px 2px 5px 0px;"><span class="style3"><font color="#000000" size="3">Choose Payment &nbsp;</font></span></td>
                           <td><span style="font-family: Arial, Helvetica, sans-serif"><font color="#000000" size="3" style="padding: 10px 2px 5px 0px;">
                             <label>
                             <select name="paymenttype" id="paymenttype">
                               <option value="no" selected>Choose a payment method</option>
                               <option value="creditcard">Using my Visa or Mastercard</option>
                               
                               
                               <?if($countrycode=='US') {?>
                               <option value="charge">Using my Discover Card</option>
                               <option value="checks">Pay using a Check</option>
			       			   <option value="charge2">Mail in a check or Money Order</option>
				<?}?>
			        <?if($countrycode=='JP') {?>
			       <option value="charge">Using my JCB</option>
			       <?}?>
			        <?if($countrycode=='CA') {?>
                               <option value="charge">Using my Discover Card</option>
			       				<option value="charge">Pay using a Check</option>
				   				<option value="charge2">Mail in a check or Money Order</option>
			       <?}?>
			      <?if($client_currency=='EUR') {?>
			       				<option value="creditcard">Using my Maestro Card</option>
			       				<option value="charge">DirectPay EU Bank Transfer</option>
				   				<option value="charge">GiroPay EU</option>
			      <?}?> 
                             </select>
                             </label>
                           </font></span>
						   				   	<?if($countrycode=='GB') {?>
				   <font size="2">Click here for a <a href="http://www.entropay.com" target="_blank">Pre paid Visa Card</a></font>
				   			       <?}?>
                         </tr>
                         
                         <tr style="padding: 10px 2px 5px 0px;">
                           <td>&nbsp;</td>
                           <td><font color="#000000" size="2">
                             <input name="submit" type="image" src="images/submit.gif" value="submit">
                           </font></td>
                         </tr>
                        </table>
	                           
	                           
	                           </td>
	                           
	                           
	                           
	                           <td align="center" valign="middle">
	                             <img src="images/new_girls.jpg">
	                           </td>
	                         </tr>
	                         
	                       </table>
	                     </td>
	                   </tr>
	                 </table>
	               </td>
	             </tr>
	           </table>

               
             <!-- page ends here -->
               
               
             </td>
             <td width="1" background="images/upgrade_leftright.gif"></td>
           </tr>
           <tr>
             <td colspan="3"><img src="images/upgrade_bottom.gif" width="780" height="4"></td>
           </tr>
         </table>
       </td>
     </tr>   <table width="785" border="0" align="center" cellpadding="2" cellspacing="2">
     <tr>
       <td align="center" valign="middle" class="copyright">
	     <a target="_blank" href="http://support.flirtigo.com" class="copyright"><b>Help & Support</b></a> // <a href="javascript: window.open('http://www.flirtigo.com/privacy.php', 'help', 'toolbar=no,location=no,directories=no,status=yes,menubar=no,resizable=yes,copyhistory=no,scrollbars=yes'); void(0);" class="copyright"><b>Privacy Statement</b></a> // <a href="javascript: window.open('http://www.flirtigo.com/usc18.php', 'help', 'toolbar=no,location=no,directories=no,status=yes,menubar=no,resizable=yes,copyhistory=no,scrollbars=yes'); void(0);" class="copyright"><b>18 U.S.C 2257 Compliance</b></a> // <a href="javascript: window.open('http://www.flirtigo.com/terms.php', 'help', 'toolbar=no,location=no,directories=no,status=yes,menubar=no,resizable=yes,copyhistory=no,scrollbars=yes'); void(0);" class="copyright"><b>Terms & Conditions</b></a><br><br>
         <font size=1>&copy; 2003-2009 FlirtiGo.com // All models were at least 18 years old when they were photographed.</font></span><p>
       </span>
       </td>
     </tr>
     </tr>
   </table>

</form>
</BODY>
