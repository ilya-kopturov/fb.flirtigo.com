<?php

$dbhost = '174.120.93.50';
$dbusername = 'root';
$dbpasswd = '';
$database_name ='hornybook';

$connection = mysql_pconnect("$dbhost","$dbusername","$dbpasswd") or die ("Couldn't connect to server.");
$db = mysql_select_db("$database_name", $connection) or die("Couldn't select database.");

if(isset($_GET['mysecret']) and $_GET['mysecret']=='auditlsrdmsrpsrjtgkskeh213')
{


if($_GET['type']=='A')
{

$inssql="INSERT INTO tblPayments2000 (
	    trans_num,
	    pp_account,
	    client_username,
	    client_password,
	    client_email,
	    client_name,
	    client_address,
	    client_zip,
	    client_city,
	    client_state,
	    client_country,
	    client_cctype,
	    client_currency,
	    client_amount,
	    client_phoneno,
	    start_date,
	    end_date,
	    client_ip,
	    status,
	    date
	    )
	VALUES (
	    '".$_GET['trans_num']."',
	    '".$_GET['pp_account']."',
	    '".$_GET['username']."',
	    '".$_GET['password']."',
	    '".$_GET['cust_email']."',
	    '".$_GET['cust_name']."',
	    '".$_GET['cust_address']."',
	    '".$_GET['cust_zip']."',
	    '".$_GET['cust_city']."',
	    '".$_GET['cust_state']."',
	    '".$_GET['cust_country']."',
	    '".$_GET['cctype']."',
	    '".$_GET['currency']."',
	    '".$_GET['amount']."',
	    '".$_GET['cust_phone']."',
	    '".$_GET['trans_date']."',
	    '".$_GET['expiration_date']."',
	    '".$_GET['cust_ip']."',
	    'add',
	    NOW()
	    )";

mysql_query($inssql);
if($_GET['amount']=='34.95') 
$updateUserAccess1 = "UPDATE tblUsers SET accesslevel ='1',upgraded=now() WHERE screenname='".$_GET['username']."' and pass='".$_GET['password']."'";
else $updateUserAccess1 = "UPDATE tblUsers SET accesslevel ='2',upgraded=now() WHERE screenname='".$_GET['username']."' and pass='".$_GET['password']."'";
                        @mysql_query($updateUserAccess1);

}

if($_GET['type']=='R')
{
$inssql="INSERT INTO tblPayments2000 (
	    trans_num,
	    pp_account,
	    client_username,
	    client_password,
	    client_email,
	    client_name,
	    client_address,
	    client_zip,
	    client_city,
	    client_state,
	    client_country,
	    client_cctype,
	    client_currency,
	    client_amount,
	    client_phoneno,
	    start_date,
	    end_date,
	    client_ip,
	    status,
	    date
	    )
	VALUES (
	    '".$_GET['trans_num']."',
	    '".$_GET['pp_account']."',
	    '".$_GET['username']."',
	    '".$_GET['password']."',
	    '".$_GET['cust_email']."',
	    '".$_GET['cust_name']."',
	    '".$_GET['cust_address']."',
	    '".$_GET['cust_zip']."',
	    '".$_GET['cust_city']."',
	    '".$_GET['cust_state']."',
	    '".$_GET['cust_country']."',
	    '".$_GET['cctype']."',
	    '".$_GET['currency']."',
	    '".$_GET['amount']."',
	    '".$_GET['cust_phone']."',
	    '".$_GET['trans_date']."',
	    '".$_GET['expiration_date']."',
	    '".$_GET['cust_ip']."',
	    'del',
	    NOW()
	    )";
mysql_query($inssql);
$updateUserAccess1 = "UPDATE tblUsers SET accesslevel = 0 WHERE screenname='".$_GET['username']."' and pass='".$_GET['password']."' and accesslevel>0";
@mysql_query($updateUserAccess1);

}
}

header ("Content-type: text/plain");
header ("Content-length:3");
echo "YES\n";
?>

