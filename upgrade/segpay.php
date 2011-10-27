<?php

$dbhost = '66.135.63.101';
$dbusername = 'flirtigo';
$dbpasswd = 'oUJq5bx9elrt-';
$database_name ='flirtigo';

$connection = mysql_pconnect("$dbhost","$dbusername","$dbpasswd") or die ("Couldn't connect to server.");
$db = mysql_select_db("$database_name", $connection) or die("Couldn't select database.");

if(isset($_REQUEST['secret']) and $_REQUEST['secret']=='Jd3ZEWVBs29U45YRT')
{



$inssql="INSERT INTO segpay (
	      `memberID`,
	      `username`,
	      `password`,
	      `name`,
	      `email`,
	      `phone`,
	      `address`,
	      `city`,
	      `state`,
	      `zipcode`,
	      `country`,
	      `action`,
	      `stage`,
	      `approved`,
	      `transtype`,
	      `eticketid`,
	      `purchaseid`,
	      `price`,
	      `currency`,
	      `ip`,
	      `initialvalue`,
	      `initialperiod`,
	      `recurringvalue`,
	      `recurringperiod`,
	      `desc`,
	      `transGUID`,
	      `standin`,
	      `xsellnum`,
	      `transtime`,
	      `actiondate`
	    )
	VALUES (
	      '".$_REQUEST['memberID']."',
	      '".$_REQUEST['username']."',
	      '".$_REQUEST['password']."',
	      '".$_REQUEST['name']."',
	      '".$_REQUEST['email']."',
	      '".$_REQUEST['phone']."',
	      '".$_REQUEST['address']."',
	      '".$_REQUEST['city']."',
	      '".$_REQUEST['state']."',
	      '".$_REQUEST['zipcode']."',
	      '".$_REQUEST['country']."',
	      '".$_REQUEST['action']."',
	      '".$_REQUEST['stage']."',
	      '".$_REQUEST['approved']."',
	      '".$_REQUEST['trantype']."',
	      '".$_REQUEST['eticketid']."',
	      '".$_REQUEST['purchaseid']."',
	      '".$_REQUEST['price']."',
	      '".$_REQUEST['currencycode']."',
	      '".$_REQUEST['ip']."',
	      '".$_REQUEST['initialvalue']."',
	      '".$_REQUEST['initialperiod']."',
	      '".$_REQUEST['recurringvalue']."',
	      '".$_REQUEST['recurringperiod']."',
	      '".$_REQUEST['desc']."',
	      '".$_REQUEST['transGUID']."',
	      '".$_REQUEST['standin']."',
	      '".$_REQUEST['xsellnum']."',
	      '".$_REQUEST['transtime']."',
	      now()
	    )";
mail("chris@w2interactive.com","SEGPAY REQUEST",$inssql);

mysql_query($inssql);

if($_REQUEST['approved']=='Yes' and $_REQUEST['stage']=='Initial')
{
   $updateUserAccess1 = "UPDATE tblUsers SET accesslevel ='2',upgraded=now() WHERE screenname='".$_REQUEST['username']."' and pass='".$_REQUEST['password']."'";
 
@mysql_query($updateUserAccess1);
}

if($_REQUEST['action']=='delete')
{
   $updateUserAccess1 = "UPDATE tblUsers SET accesslevel ='0' WHERE screenname='".$_REQUEST['username']."' and pass='".$_REQUEST['password']."'";
   @mysql_query($updateUserAccess1);
}
}


header ("Content-type: text/plain");
header ("Content-length:3");
echo "DONE\n";
?>

