<?php
                                                                                         */
define("IN_MAINSITE", TRUE);

include ("../includes/" . "require" . "/" . "site_head.php");


check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);


//////
list($countryName) = @mysql_fetch_row( mysql_query('SELECT c.country
                                                    FROM ip2nationCountries c, ip2nation i
                                                    WHERE i.ip < INET_ATON("'.$_SERVER['REMOTE_ADDR'].'") AND c.code = i.country
                                                        ORDER BY i.ip DESC
                                                        LIMIT 0,1'
                                                      )
                                          );

list($email) = @mysql_fetch_row( mysql_query('SELECT email FROM tblUsers WHERE id='.$_SESSION['sess_id'].' and pass='.$_SESSION['sess_pass']));

if($countryName == "Canada" || $countryName == "Israel" || $countryName == "Romania"){
	$smarty->assign("footerPic", "<img src='/images/support-address.gif' />");
}

$smarty->assign("countryName",$countryName);
$smarty->assign("priceone",$priceone);
$smarty->assign("pricetwo",$pricetwo);
//////

if(isset($_POST['submit']))
{

 if($_POST['ptype']=='ccbillcc')
 {
 header_location('https://bill.ccbill.com/jpost/signup.cgi?clientAccnum=934240&clientSubacc=0003&language=English&formName=144cc&email='.$email.'&username='.$_SESSION['sess_screenname'].'&password='.$_SESSION['sess_pass']);
 
 }
 if($_POST['ptype']=='ccbillck')
 {
 header_location('https://bill.ccbill.com/jpost/signup.cgi?clientAccnum=934240&clientSubacc=0003&language=English&formName=144ck&email='.$email.'&username='.$_SESSION['sess_screenname'].'&password='.$_SESSION['sess_pass']);
 
 }
      
 if($_POST['ptype']=='charge')
 {
 header_location('http://select.2000charge.com/PaymentOptions.asp?ID=8614&Language=English&Username='.$_SESSION['sess_screenname'].'&XField=&Userpassword='.$_SESSION['sess_pass'].'&Userpassword2='.$_SESSION['sess_pass']);
 }
 if($_POST['ptype']=='mailin')
 {
 header_location('mailin.php');
 }

}

if(isset($_GET['pid']) and (int) $_GET['pid'] > 0)
{
$users =$db->get_row("SELECT * FROM tblUsers WHERE id = ".$_GET['pid']." LIMIT 1");
$smarty->assign("user",$users);
$smarty->assign("pid",$_GET['pid']);
}

$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('location', 'smarty_location');
$smarty->register_function('age', 'smarty_age');
$smarty->register_function('rateme', 'smarty_rateme');


$smarty->display( $cfg['template']['dir_template'] . "login/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "upgrade.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "login/" . "footer.tpl" );

$smarty->unregister_function('looking', 'smarty_looking');
$smarty->unregister_function('location', 'smarty_location');
$smarty->unregister_function('age', 'smarty_age');
$smarty->unregister_function('rateme', 'smarty_rateme');

include ("../includes/" . "require" . "/" . "site_foot.php");
?>
