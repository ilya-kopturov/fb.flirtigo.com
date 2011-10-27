<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

if ( !defined('IN_MAINSITE') )
{
	die("Critical Error!");
}



//error_reporting(E_ERROR | E_WARNING | E_PARSE);

set_magic_quotes_runtime(0);

ini_set("magic_quotes_gpc", '0');


include_once("./includes/config/" . "db.php");
include_once("./includes/config/" . "path.php");
include_once("./includes/config/" . "image.php");
include_once("./includes/config/" . "option.php");
include_once("./includes/config/" . "profile.php");
include_once("./includes/config/" . "template.php");

include_once("./includes/function/" . "general.php");
include_once("./includes/function/" . "image.php");
include_once("./includes/function/" . "video.php");
include_once("./includes/function/" . "login.php");
include_once("./includes/function/" . "smarty.php");
include_once("./includes/function/" . "profile.php");
include_once("./includes/function/" . "mailer.php");
include_once("./includes/function/" . "member.php");
include_once("./includes/function/" . "search.php");

include_once( $cfg['path']['dir_include'] . "class"  . "/" . "image.php" );
include_once( $cfg['path']['dir_include'] . "class"  . "/" . "db.php" );
include_once( $cfg['path']['dir_include'] . "class"  . "/" . "join.php" );
include_once( $cfg['path']['dir_include'] . "class"  . "/" . "xmlrpc.php" );

include_once( $cfg['path']['dir_include'] . "class"  . "/" . "phpmailer.php" );

include_once( $cfg['path']['dir_include'] . "smarty" . "/" . "Smarty.class.php");



$smarty = new Smarty;

$smarty->force_compile = false;
$smarty->debugging 	   = true;
$smarty->compile_check = true;

$smarty->assign("cfg", $cfg);

session_start();
?>
