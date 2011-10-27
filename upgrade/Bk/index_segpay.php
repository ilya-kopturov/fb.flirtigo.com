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


if($countryName=='Great Britain (UK)') 
    {
    $priceone="£19.95";
    $pricetwo="£39.95";
    
    if($_POST['acctype']=='1')
	{
	$tkid='113107:5144';
        
        }
    if($_POST['acctype']=='2')
	{
	$tkid='113107:5183';
        
        }
            
    }
    
elseif($countryName=='Austria' or $countryName=='France' or $countryName=='Germany' or $countryName=='Italy' or $countryName=='Spain' or$countryName=='Netherlands' or $countryName=='Finland' or $countryName=='Denmark' or $countryName=='Sweden' or $countryName=='Ireland' or $countryName=='Poland' or $countryName=='Portugal') 
    {
     $priceone="19.95 &euro; ";
     $priceone="39.95 &euro; ";
    
    if($_POST['acctype']=='1')
	{
	$tkid='113108:5182';
       
        }
    if($_POST['acctype']=='2')
	{
	$tkid='113108:5148';
        
        }
            
    }
else
    {
    $priceone="$34.95";
    $pricetwo="$69.95";
    
    if($_POST['acctype']=='1')
	{
	$tkid='113116:5153';
        
        }
    if($_POST['acctype']=='2')
	{
	$tkid='113116:5154';
        
        }
            
    }        

if(!isset($tkid)) $tkid='113116:5153';

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
 header_location('https://secure2.segpay.com/billing/poset.cgi?x-eticketid='.$tkid.'&memberID='.$_SESSION['sess_id'].'&x-auth-link=http%3A%2F%2Fwww.flirtigo.com%2F&x-auth-text=CLICK+HERE+TO+SIGNIN+TO+THE+MEMBERS+AREA!&x-decl-link=http%3A%2F%2Fwww.flirtigo.com%2Fupgrade%2Fsegpaydeclinedcc.php&x-decl-text=CLICK+HERE+TO+TRY+OUR+ALTERNATIVE+PAYMENT+PROCESSOR&username='.$_SESSION['sess_screenname'].'&password='.$_SESSION['sess_pass']);
 }

 if($_POST['ptype']=='ccbillck')
 {
 if($_POST['acctype']=='1')
  {
  header_location('https://secure2.segpay.com/billing/poset.cgi?x-eticketid=113127:5153&memberID='.$_SESSION['sess_id'].'&x-auth-link=http%3A%2F%2Fwww.flirtigo.com%2F&x-auth-text=CLICK+HERE+TO+SIGNIN+TO+THE+MEMBERS+AREA!&x-decl-link=http%3A%2F%2Fwww.flirtigo.com%2Fupgrade%2Fsegpaydeclinedck.php&x-decl-text=CLICK+HERE+TO+TRY+OUR+ALTERNATIVE+PAYMENT+PROCESSOR&username='.$_SESSION['sess_screenname'].'&password='.$_SESSION['sess_pass']);
  }
  if($_POST['acctype']=='2')
  {
  header_location('https://secure2.segpay.com/billing/poset.cgi?x-eticketid=113127:5154&memberID='.$_SESSION['sess_id'].'&x-auth-link=http%3A%2F%2Fwww.flirtigo.com%2F&x-auth-text=CLICK+HERE+TO+SIGNIN+TO+THE+MEMBERS+AREA!&x-decl-link=http%3A%2F%2Fwww.flirtigo.com%2Fupgrade%2Fsegpaydeclinedck.php&x-decl-text=CLICK+HERE+TO+TRY+OUR+ALTERNATIVE+PAYMENT+PROCESSOR&username='.$_SESSION['sess_screenname'].'&password='.$_SESSION['sess_pass']);
  }
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
