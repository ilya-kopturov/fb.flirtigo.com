<?php

define("IN_MAINSITE", TRUE);

//include "../includes/require/site_head.php";
include ("../includes/" . "require" . "/" . "site_head.php");
//var_dump( $_SESSION['sess_pass']);
//var_dump( $_SESSION['sess_screenname']);
//die("xx");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$erro = '';

$query = "
	SELECT
		*
	FROM
		wls_account_details_segpay
	WHERE
		client_domain_id = " . $client_area['id'];
$result = mysql_query($query);
$segpay_account = mysql_fetch_array($result);

//////
$query = '
	SELECT
		c.country
	FROM
		ip2nationCountries c,
		ip2nation i
	WHERE
		i.ip < INET_ATON("'.$_SERVER['REMOTE_ADDR'].'")
		AND c.code = i.country
	ORDER BY
		i.ip DESC
	LIMIT 0, 1';
list($countryName) = mysql_fetch_row(mysql_query($query));


if ($countryName == 'Great Britain (UK)') {
	$priceone = "£19.95";
	$pricetwo = "£39.95";

	if ($_POST['acctype'] == '1') {
		$tkid = $segpay_account['gb_silver'];
	}
    if ($_POST['acctype'] == '2') {
		$tkid = $segpay_account['gb_gold'];
	}
} elseif ($countryName == 'Austria' || $countryName == 'France' || $countryName == 'Germany' || $countryName == 'Italy' || $countryName == 'Spain' || $countryName == 'Netherlands' || $countryName == 'Finland' || $countryName == 'Denmark' || $countryName == 'Sweden' || $countryName == 'Ireland' || $countryName == 'Poland' || $countryName == 'Portugal') {
	$priceone = "19.95 &euro; ";
	$priceone = "39.95 &euro; ";

	if ($_POST['acctype'] == '1') {
		$tkid = $segpay_account['europe_silver'];
	}
    if ($_POST['acctype'] == '2') {
		$tkid = $segpay_account['europe_gold'];
	}
} else {
	$priceone = "$34.95";
	$pricetwo = "$69.95";

	if (isset($_POST['acctype']) AND $_POST['acctype'] == '1') {
		$tkid = $segpay_account['all_silver'];
	}
	if (isset($_POST['acctype']) AND $_POST['acctype'] == '2') {
		$tkid = $segpay_account['all_gold'];
	}
}

if (!isset($tkid)) {
	$tkid = $segpay_account['all_silver'];
}

if ($countryName == "Canada" || $countryName == "Israel" || $countryName == "Romania") {
	$smarty->assign("footerPic", "<img src='/images/support-address.gif' />");
}

$smarty->assign("countryName", $countryName);
$smarty->assign("priceone", $priceone);
$smarty->assign("pricetwo", $pricetwo);


if (isset($_POST['submit'])) {
	//header_location('http://join.'.$client_area['domain_name'].'/signup/signup.php');
	if(!isset($_POST['upgrade_type'])){
		if($_POST['acctype']==1){
		
			echo"<script language='javascript' type='text/javascript'>window.open('http://join.".$client_area['domain_name']."/signup/signup.php?nats=".$_REQUEST['nats']."&signup[username]=".$_SESSION['sess_screenname']."&signup[password]=".$_SESSION['sess_pass']."&signup[email]=".$db->get_var("SELECT `email` FROM `tblUsers` WHERE `id`=".$_SESSION['sess_id'])."&signup[country]=".$db->get_var("SELECT `code` FROM `geo_country` WHERE `country_title`='".mysql_real_escape_string($cfg['countries'][$_SESSION['sess_country']])."'")."&signup[optionid]=1&cascade=default&step=2','paying','resizable=yes,scrollbars=yes,width=500,height=600');void(0);</script>";
		}elseif($_POST['acctype']==2){
			echo"<script language='javascript' type='text/javascript'>window.open('http://join.".$client_area['domain_name']."/signup/signup.php?nats=".$_REQUEST['nats']."&signup[username]=".$_SESSION['sess_screenname']."&signup[password]=".$_SESSION['sess_pass']."&signup[email]=".$db->get_var("SELECT `email` FROM `tblUsers` WHERE `id`=".$_SESSION['sess_id'])."&signup[country]=".$db->get_var("SELECT `code` FROM `geo_country` WHERE `country_title`='".mysql_real_escape_string($cfg['countries'][$_SESSION['sess_country']])."'")."&signup[optionid]=4&cascade=default&step=2','paying','resizable=yes,scrollbars=yes,width=500,height=600');void(0);</script>";
		
		}
	}else{
		if($_POST['promcode']==""){
			$erro="Please enter a code!";
		}else{
			$promocodeSelected=$db->get_row("SELECT * FROM `tblPromCode` WHERE `promocode`='".mysql_real_escape_string($_POST['promcode'])."'");
			if(empty($promocodeSelected)){
				$erro="Promo Code Invalid!";
			}else{
				echo"<script language='javascript' type='text/javascript'>window.open('http://join.".$client_area['domain_name']."/signup/signup.php?nats=".$_REQUEST['nats']."&signup[username]=".$_SESSION['sess_screenname']."&signup[password]=".$_SESSION['sess_pass']."&signup[email]=".$db->get_var("SELECT `email` FROM `tblUsers` WHERE `id`=".$_SESSION['sess_id'])."&signup[country]=".$db->get_var("SELECT `code` FROM `geo_country` WHERE `country_title`='".mysql_real_escape_string($cfg['countries'][$_SESSION['sess_country']])."'")."&signup[optionid]=".$promocodeSelected['natsOptionId']."&cascade=default&step=2','paying','resizable=yes,scrollbars=yes,width=500,height=600');void(0);</script>";
			}
		}
	}
	
}

$smarty->assign("erro", $erro);
$smarty->register_function('looking', 'smarty_looking');
$smarty->register_function('location', 'smarty_location');
$smarty->register_function('age', 'smarty_age');
$smarty->register_function('rateme', 'smarty_rateme');

//var_dump($_SESSION['sess_screenname']);
//var_dump($_SESSION['sess_pass']);

$smarty->display($cfg['template']['dir_template'] . "login/header.tpl");
$smarty->display($cfg['template']['dir_template'] . "login/upgrade.tpl");
$smarty->display($cfg['template']['dir_template'] . "login/footer.tpl");

$smarty->unregister_function('looking', 'smarty_looking');
$smarty->unregister_function('location', 'smarty_location');
$smarty->unregister_function('age', 'smarty_age');
$smarty->unregister_function('rateme', 'smarty_rateme');

include "../includes/require/site_foot.php";
?>