<?php
/* DIRTYFLIRTING.COM

                                                                                         */
define("IN_MAINSITE", TRUE);


include ("../includes/" . "require" . "/" . "site_head.php");

///////////// SESSION /////////////
session_start();
//if($_SESSION['sess_id']==378925){
	//var_dump($_SESSION);
//}
require('form_options.php');
if(isset($_GET['id']))
{
    $sql_login = "SELECT `id`, `screenname`, `pass`,`email`, `sex`, `typeusr`, `looking`, `rating`, `votes`, `city`, `country`,
                             `state`, `accesslevel`, `hide` FROM `tblUsers` WHERE `id`=".$_GET['id'];

	if($qresult = mysql_query($sql_login . " AND `disabled` = 'N'")){
   		while ($row = mysql_fetch_assoc($qresult)) {
   			if(!isset($_SESSION["sess_id"])){
    			$_SESSION["sess_id"]          =  $row['id'];
        		$_SESSION["sess_screenname"]  =  $row['screenname'];
        		$_SESSION["sess_pass"]        =  $row['pass'];
        		$_SESSION["sess_email"]       =  $row['email'];
        		$_SESSION["sess_accesslevel"] =  $row['accesslevel'];
   			}
    	}
    }
}

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

//////
list($countryName) = @mysql_fetch_row( mysql_query('SELECT c.country
                                                    FROM ip2nationCountries c, ip2nation i
                                                    WHERE i.ip < INET_ATON("'.$_SERVER['REMOTE_ADDR'].'") AND c.code = i.country
                                                        ORDER BY i.ip DESC
                                                        LIMIT 0,1'
                                                      )
                                          );


if($countryName=='Great Britain (UK)'){
    $priceone="£19.95";
    $pricetwo="£39.95";
    $pricethree="";
    
    $currency='£';$client_currency='GBP';
    
    if($_POST['acctype']=='1'){
		$tkid='113107:5144';
    }
    if($_POST['acctype']=='2'){
		$tkid='113107:5183';
    }
	if($_POST['acctype']=='3'){
		//$tkid='113107:5183';
    }
            
}elseif($countryName=='Austria' or $countryName=='France' or $countryName=='Germany' or $countryName=='Italy' or $countryName=='Spain' or$countryName=='Netherlands' or $countryName=='Finland' or $countryName=='Denmark' or $countryName=='Sweden' or $countryName=='Ireland' or $countryName=='Poland' or $countryName=='Portugal'){
     $priceone="19.95 &euro; ";
     $pricetwo="39.95 &euro; ";
     $pricethree="";
     
     $currency='&euro;';$client_currency='EUR';
     
    if($_POST['acctype']=='1'){
		$tkid='113108:5182';
    }
    if($_POST['acctype']=='2'){
		$tkid='113108:5148';    
    }
	if($_POST['acctype']=='3'){
		//$tkid='113116:5154';
    }
            
}else{
	$priceone="$24.95";
    $pricetwo="$49.95";
    //$priceone="$29.95";
    //$pricetwo="$59.75";
    //$pricethree="$89.75";
    
    $currency='$';$client_currency='USD';
    
    if($_POST['acctype']=='1'){
		$tkid='113116:5153';
    }
    if($_POST['acctype']=='2'){
		$tkid='113116:5154';
    }
	if($_POST['acctype']=='3'){
		//$tkid='1168563:5154';
    }        
}        

if(!isset($tkid)){ $tkid='113116:5153';$currency='$';$client_currency='USD';}

if($countryName == "Canada" || $countryName == "Israel" || $countryName == "Romania"){
	$smarty->assign("footerPic", "<img src='/images/support-address.gif' />");
}

$smarty->assign("cfg",$cfg);

$smarty->assign("countryName",$countryName);
$smarty->assign("priceone",$priceone);
$smarty->assign("pricetwo",$pricetwo);
$smarty->assign("pricethree",$pricethree);

$smarty->assign("client_currency",$client_currency);

//////

if(isset($_GET['pid']) and (int) $_GET['pid'] > 0){
	$users =$db->get_row("SELECT * FROM tblUsers WHERE id = ".$_GET['pid']." LIMIT 1");
	$smarty->assign("user",$users);
	$smarty->assign("pid",$_GET['pid']);
}

$errorpayment='';
//$_POST['client_country']="RO";

if(isset($_POST['submit'])){
	if($_POST['ptype']=='ccbillcc'){
		if($client_currency=='USD'){
			
			if($_POST['client_fname']=='') $errorpayment .='First name field cannot be empty<br>';
			if($_POST['client_lname']=='') $errorpayment .='Last name field cannot be empty<br>';
			if($_POST['client_address']=='') $errorpayment .='Address field cannot be empty<br>';
			if($_POST['client_zip']=='') $errorpayment .='ZIP/Postal field cannot be empty<br>';
			if($_POST['client_city']=='') $errorpayment .='City field cannot be empty<br>';
			if(!$_POST['client_state'] && ($_POST['client_country'] == 'US' || !$_POST['client_country'])) {
                $errorpayment .='Please select the State<br>';
        	}
        	if(!$_POST['client_zip'] && ( $_POST['client_country'] == 'US' || !$_POST['client_country'])) {
                $errorpayment .='ZIP/Postal field cannot be empty<br>';
        	}
        	if(!$_POST['client_country']) {
                $errorpayment .='Please check the Country<br>';
			}
			if($_POST['acctype']==1){
				$client_amount='24.95';
			}elseif($_POST['acctype']==2){
				$client_amount='49.95';
			}elseif($_POST['acctype']==3){
				$client_amount='89.75';
			}
			if($errorpayment==''){
				$_SESSION['client_fname'] = $_POST['client_fname'];
    			$_SESSION['client_lname'] = $_POST['client_lname'];
    			$_SESSION['client_address'] = $_POST['client_address'];
    			$_SESSION['client_zip'] = $_POST['client_zip'];
    			$_SESSION['client_amount'] = $_POST['client_amount'];
    			$_SESSION['client_currency'] = $client_currency;
    			$_SESSION['client_city'] = $_POST['client_city']; 
    			$_SESSION['client_state'] = $_POST['client_state'];
    			$_SESSION['client_country'] = $_POST['client_country'];
			
				//if($client_amount=='29.95' and $client_currency=='USD'){header("Location: https://secure.zombaio.com/get_proxy.asp?SiteID=287651487&PricingID=1167555&return_url_approve=http://www.flirtigo.com/upgrade/approved.php&return_url_decline=http://www.flirtigo.com/upgrade/declined.php&Username=".$_SESSION['sess_screenname']."&Password=".$_SESSION['sess_pass']."&Email=".$_SESSION['sess_email']."&FirstName=".$_SESSION['client_fname']."&LastName=".$_SESSION['client_lname']."&Address=".$_SESSION['client_address']."&Postal=".$_SESSION['client_zip']."&Region=".$_SESSION['client_state']."&City=".$_SESSION['client_city']."&Country=".$_SESSION['client_country']);}

        		//if($client_amount=='59.75' and $client_currency=='USD'){header("Location: https://secure.zombaio.com/get_proxy.asp?SiteID=287651487&PricingID=1168521&return_url_approve=http://www.flirtigo.com/upgrade/approved.php&return_url_decline=http://www.flirtigo.com/upgrade/declined.php&Username=".$_SESSION['sess_screenname']."&Password=".$_SESSION['sess_pass']."&Email=".$_SESSION['sess_email']."&FirstName=".$_SESSION['client_fname']."&LastName=".$_SESSION['client_lname']."&Address=".$_SESSION['client_address']."&Postal=".$_SESSION['client_zip']."&Region=".$_SESSION['client_state']."&City=".$_SESSION['client_city']."&Country=".$_SESSION['client_country']);}

      			//if($client_amount=='89.75' and $client_currency=='USD'){header("Location: https://secure.zombaio.com/get_proxy.asp?SiteID=287651487&PricingID=1168563&return_url_approve=http://www.flirtigo.com/upgrade/approved.php&return_url_decline=http://www.flirtigo.com/upgrade/declined.php&Username=".$_SESSION['sess_screenname']."&Password=".$_SESSION['sess_pass']."&Email=".$_SESSION['sess_email']."&FirstName=".$_SESSION['client_fname']."&LastName=".$_SESSION['client_lname']."&Address=".$_SESSION['client_address']."&Postal=".$_SESSION['client_zip']."&Region=".$_SESSION['client_state']."&City=".$_SESSION['client_city']."&Country=".$_SESSION['client_country']);}
			
			}			
		}else{
 			//header_location('https://secure2.segpay.com/billing/poset.cgi?x-eticketid='.$tkid.'&memberID='.$_SESSION['sess_id'].'&x-auth-link=http%3A%2F%2Fwww.flirtigo.com%2F&x-auth-text=CLICK+HERE+TO+SIGNIN+TO+THE+MEMBERS+AREA!&x-decl-link=http%3A%2F%2Fwww.flirtigo.com%2Fupgrade%2Fsegpaydeclinedcc.php&x-decl-text=CLICK+HERE+TO+TRY+OUR+ALTERNATIVE+PAYMENT+PROCESSOR&username='.$_SESSION['sess_screenname'].'&password='.$_SESSION['sess_pass']);
		}
		header_location('https://secure2.segpay.com/billing/poset.cgi?x-eticketid='.$tkid.'&memberID='.$_SESSION['sess_id'].'&x-auth-link=http%3A%2F%2Fwww.flirtigo.com%2F&x-auth-text=CLICK+HERE+TO+SIGNIN+TO+THE+MEMBERS+AREA!&x-decl-link=http%3A%2F%2Fwww.flirtigo.com%2Fupgrade%2Fsegpaydeclinedcc.php&x-decl-text=CLICK+HERE+TO+TRY+OUR+ALTERNATIVE+PAYMENT+PROCESSOR&username='.$_SESSION['sess_screenname'].'&password='.$_SESSION['sess_pass']);
 	}

 	if($_POST['ptype']=='ccbillck'){
 		if($_POST['acctype']=='1'){
  			header_location('https://secure2.segpay.com/billing/poset.cgi?x-eticketid=113127:5153&memberID='.$_SESSION['sess_id'].'&x-auth-link=http%3A%2F%2Fwww.flirtigo.com%2F&x-auth-text=CLICK+HERE+TO+SIGNIN+TO+THE+MEMBERS+AREA!&x-decl-link=http%3A%2F%2Fwww.flirtigo.com%2Fupgrade%2Fsegpaydeclinedck.php&x-decl-text=CLICK+HERE+TO+TRY+OUR+ALTERNATIVE+PAYMENT+PROCESSOR&username='.$_SESSION['sess_screenname'].'&password='.$_SESSION['sess_pass']);
  		}
  		if($_POST['acctype']=='2'){
  			header_location('https://secure2.segpay.com/billing/poset.cgi?x-eticketid=113127:5154&memberID='.$_SESSION['sess_id'].'&x-auth-link=http%3A%2F%2Fwww.flirtigo.com%2F&x-auth-text=CLICK+HERE+TO+SIGNIN+TO+THE+MEMBERS+AREA!&x-decl-link=http%3A%2F%2Fwww.flirtigo.com%2Fupgrade%2Fsegpaydeclinedck.php&x-decl-text=CLICK+HERE+TO+TRY+OUR+ALTERNATIVE+PAYMENT+PROCESSOR&username='.$_SESSION['sess_screenname'].'&password='.$_SESSION['sess_pass']);
  		}
 	}
 	if($_POST['ptype']=='charge'){
 		header_location('http://select.2000charge.com/PaymentOptions.asp?ID=9894&Language=English&Username='.$_SESSION['sess_screenname'].'&XField=&Userpassword='.$_SESSION['sess_pass'].'&Userpassword2='.$_SESSION['sess_pass']);
 	}
 	if($_POST['ptype']=='mailin'){
		header_location('mailin.php');
 	}
 	if(isset($_GET['pid']) and (int) $_GET['pid'] > 0){
		if($users['typeusr']=='Y'){
			mysql_query("INSERT INTO `tblRepliedMailsToFakeUsers` (`fake_id`,`user_id`,`date`) VALUES('".$_GET['pid']."','".$_SESSION['sess_id']."',NOW())");
		}
 	}
}

$smarty->assign("errorpayment",$errorpayment);
$smarty->assign("states",$states);
$smarty->assign("countries",$countries);
if(isset($_POST) && !empty($_POST)){
	$smarty->assign("lastpost",$_POST);
}else{
	$smarty->assign("lastpost","");
}
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('location', 'smarty_location');
$smarty->register_function('age', 'smarty_age');
$smarty->register_function('rateme', 'smarty_rateme');
$smarty->register_function('ratemessl', 'smarty_rateme_ssl');

$smarty->display( $cfg['template']['dir_template'] . "login/" . "headerssl.tpl" );


$smarty->display( $cfg['template']['dir_template'] . "login/" . "upgrade.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footerssl.tpl" );

$smarty->unregister_function('looking', 'smarty_looking');
$smarty->unregister_function('location', 'smarty_location');
$smarty->unregister_function('age', 'smarty_age');
$smarty->unregister_function('rateme', 'smarty_rateme');
$smarty->unregister_function('ratemessl', 'smarty_rateme_ssl');

//include ("../includes/" . "require" . "/" . "site_foot.php");
?>
