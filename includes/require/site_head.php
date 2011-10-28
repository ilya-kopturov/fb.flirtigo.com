<?php
/* $Id: site_head.php 572 2008-06-19 08:00:20Z bogdan $ */

ob_start();
//'ob_gzhandler');

session_start();

date_default_timezone_set ('Europe/Kiev');

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past



if (!defined('IN_MAINSITE')) die("Critical Error!");

//error_reporting(E_ALL & ~E_NOTICE);
//set_magic_quotes_runtime(0);
//ini_set("magic_quotes_gpc", '0');

/*
//echo '<pre>';
//ini_set('display_errors', 1);
//error_reporting(E_ALL & ~(E_NOTICE|E_DEPRECATED));
//error_reporting(E_ALL & ~(E_DEPRECATED));
//echo '</pre>';
 */

//echo $_SERVER['REQUEST_URI'];

//$path = '/usr/lib/pear';
//set_include_path(get_include_path() . PATH_SEPARATOR . $path);

include_once realpath(dirname(__FILE__) . '/../config') . '/common.php';		// fphp

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    define("IS_AJAX", TRUE);
} else {
    define("IS_AJAX", FALSE);
}

include_once(PATH_INCLUDES . 'Zend/Loader.php');
spl_autoload_register('Zend_Loader::autoload');

include_once(PATH_INCLUDES . "config/path.php");
include_once(PATH_INCLUDES . "config/db.php");
include_once(PATH_INCLUDES . "config/crypt.php");
include_once(PATH_INCLUDES . "config/mail.php");
//override server settings
@include_once(PATH_INCLUDES . 'config/local.conf.php');

//it's time to check if ajax scripts are called correctly
if (IS_AJAX && !IS_ADMIN && stristr(php_sapi_name(), 'apache')) {
	$apache_headers = array_change_key_case(apache_request_headers(), CASE_LOWER);
	if (strtolower($apache_headers['x-requested-with']) != 'xmlhttprequest') {
		die('<script>setTimeout(function(){window.location.href="' . $cfg['path']['url_site'] . '"}, 1500)</script><span style="display:inline-block;vertical-align:middle;">&nbsp;Browser Error! <a href="http://www.matchbill.com" target="_blank">Please Contact Support</a> and tell us what you did in order to receive the error.</span>');
	}
}

include_once(PATH_INCLUDES . "config/image.php");
include_once(PATH_INCLUDES . "config/video.php");
include_once(PATH_INCLUDES . "config/option.php");
include_once(PATH_INCLUDES . "config/profile.php");
include_once(PATH_INCLUDES . "config/template.php");
include_once(PATH_INCLUDES . "config/countries.php");
include_once(PATH_INCLUDES . "config/facebook.php");

include_once(PATH_INCLUDES . "function/general.php");
include_once(PATH_INCLUDES . "function/image.php");
include_once(PATH_INCLUDES . "function/video.php");
include_once(PATH_INCLUDES . "function/login.php");
include_once(PATH_INCLUDES . "function/smarty.php");
include_once(PATH_INCLUDES . "function/profile.php");
include_once(PATH_INCLUDES . "function/mailer.php");
include_once(PATH_INCLUDES . "function/member.php");
include_once(PATH_INCLUDES . "function/search.php");
include_once(PATH_INCLUDES . "function/facebook_func.php");

include_once(PATH_INCLUDES . "class/image.php");
include_once(PATH_INCLUDES . "class/db.php");
include_once(PATH_INCLUDES . "class/join.php");
//include_once(PATH_INCLUDES . "class/xmlrpc.php");
include_once(PATH_INCLUDES . "class/phpmailer.php");
include_once(PATH_INCLUDES . "smarty/Smarty.class.php");

class DFSmarty extends Smarty {
	public function __construct() {
		global $cfg;

		parent::Smarty();
		$this->template_dir = PATH_TEMPLATES;
		$this->compile_dir = PATH_ROOT . "templates_c";
		$this->force_compile = false;
		$this->debugging = false;
		$this->compile_check = true;
		//$this->error_reporting = E_ALL & ~E_NOTICE;
		$this->use_sub_dirs = true;
	}
}

$smarty = new DFSmarty();
$smarty->register_function('rnd_md5', 'smarty_rnd_md5');
$smarty->register_function('screenname', 'smarty_screenname');
$smarty->assign("cfg", $cfg);
$smarty->assign('site_section', $site_section = ($_SESSION['sess_id'] ? 'login' : 'public'));

if (isset($_GET['error'])) $smarty->assign("error", htmlspecialchars(strip_tags($_GET['error'])));
if (isset($_GET['msg'])) $smarty->assign("msg",   htmlspecialchars(strip_tags($_GET['msg'])));

$db = &DFDB::factory("mysql://{$cfg['db']['user']}:{$cfg['db']['password']}@{$cfg['db']['host']}/{$cfg['db']['db']}");
if (MDB2::isError($db)) {
	$smarty->display(PATH_TEMPLATES . "site/dirtyflirting/{$site_section}/header.tpl");
	$smarty->display(PATH_TEMPLATES . "site/dirtyflirting/public/sqlerror.tpl" );
	$smarty->display(PATH_TEMPLATES . "site/dirtyflirting/{$site_section}/footer.tpl" );
	exit;
}

if (!(IS_AJAX === true) && $_SESSION['sess_id']) $_SESSION["sess_newmails"] = number_format($db->get_var("SELECT COUNT(*) FROM tblMails WHERE user_id = '{$_SESSION['sess_id']}' AND (`folder` = '1' OR `folder` = '5') AND new = 'Y'"), 0, '', '');

//Access Control List
include_once(PATH_INCLUDES . "class/liveuser.php" );
/* common vars */
$smarty->assign('base_url', $cfg['path']['url_site']);
$smarty->assign("canvas_width", '744');
/**
 * UK IP
 */
//$_SERVER['REMOTE_ADDR'] = '84.13.175.153';

/* Get Region & Country */
$userArea = ip2area($_SERVER['REMOTE_ADDR']);
$smarty->assign("userArea", $userArea);

/* FB and login vars init */
$smarty->assign("app_id", $cfg['facebook']['app_id']);
$smarty->assign("canvas_url", $cfg['facebook']['canvas_url']);
$smarty->assign("url", $fb_auth_url);
$smarty->assign('sess_id', $_SESSION["sess_id"]);
$smarty->assign('logout_url', $logout_url);
if($fb_user_id) {
    $sql_login = "
        SELECT `tu`.`screenname`, `tu`.`pass`
        FROM `tblUsers` AS `tu`
        INNER JOIN `tblFBData` AS `tfd` ON `tfd`.`user_id` = `tu`.`id`
        WHERE `tfd`.`fb_id` = '$fb_user_id'
        AND `disabled` = 'N'
    ";
    if ($result = $db->get_row($sql_login)) {
        $screenname = trim($result['screenname']);
        $pass = trim($result['pass']);
        if (!$screenname) {
            $screenname = '';
        }
        if (!$pass) {
            $pass = '';
        }
    }
    $common_data = array (
        'screenname'                        => $screenname,
        'pass'                              => $pass,
    );
    $smarty->assign('screenname', $screenname);
    
} else {
    $check_username = $_SESSION['sess_screenname'];
    $check_password = $_SESSION['sess_pass'];
    if(!isset($check_username)) {
        $check_username = '';
    }
    if(!isset($check_password)) {
        $check_password = '';
    }
    if ($check_username !== '' && $check_password !== '') {
        $sql = "SELECT `id`, `screenname`, `pass` FROM `tblUsers` WHERE `screenname` = '" . $check_username . "' AND `pass` = '" . $check_password . "' AND `disabled` = 'N'";
        if ($result = $db->get_row($sql)) {
            $screenname = trim($result['screenname']);
            $pass = trim($result['pass']);
            if (!$screenname) {
                $screenname = '';
            }
            if (!$pass) {
                $pass = '';
            }
        }
    }
    $common_data = array (
        'screenname'                        => $screenname,
        'pass'                              => $pass,
    );
    $smarty->assign('screenname', $screenname);
}
/* End FB and login vars init */