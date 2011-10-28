<?php
/* DIRTYFLIRTING.COM */

define("IN_MAINSITE", TRUE);

include("./includes/" . "require" . "/" . "site_head.php" );
include("captcha"                 . "/" . "rand.php"      );

/* ... form submit ... */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($fb_user_id) {
        $fb_data = @$db->query("
            SELECT 
                user_id
            FROM tblFBData
            WHERE fb_id = '".$fb_user_id."';
        ");
        if($fb_data) {
            $row = $fb_data->fetchRow();
        }
        if(is_array($row)) {
            $user_id = intval($row['user_id']);
        } else {
            $user_id = 0;
        }
        $join = new join($db, $_POST, $user_id);
        $smarty->assign("data", $join->data);
        $smarty->assign("error", $join->error);
    } else {
        $join = new join($db, $_POST);
        $smarty->assign("data", $join->data);
        $smarty->assign("error", $join->error);
    }
}
elseif(isset($_POST['reload_pic']))
{
	$smarty->assign("data", $_POST);
}
/* ..end form submit.. */

/* ... code verification ... */
$_SESSION["captcha_id"] = $str;
/* ..end code verification.. */


/* ... assign ... */
$smarty->assign("page", "join");

$smarty->assign("days",   range(1,31));
$smarty->assign("months", array(1 => "January",2 => "February" ,3 =>  "March"   ,4 => "April"    ,5 => "May"      ,6 => "June",7 => "July",
                                8 => "August" ,9 => "September",10 => "October",11 => "November",12 => "December"));
$smarty->assign("years",  range(date("Y")-18,1908));

$smarty->assign("countries", $cfg['countries']);
$smarty->assign("states",    $cfg['states']);
$smarty->assign("featured",  $featured);
$smarty->assign("stats",     $stats);

if(isset($_GET['screen_name']))
{
	$smarty->assign("screen_name", htmlspecialchars(strip_tags($_GET['screen_name'])));
}

if(isset($_GET['error']))
{
	$smarty->assign("error", htmlspecialchars(strip_tags($_GET['error'])));
}

if(isset($_GET['msg']))
{
	$smarty->assign("msg",   htmlspecialchars(strip_tags($_GET['msg'])));
}
/*.. end assign ..*/

/* footerPic */
if($userArea['id'] == 1 || $userArea['id'] == 2 || $userArea['id'] == 103 || $userArea['id'] == 175){
	$smarty->assign("footerPic", "<img src='/images/support-address.gif' />");
}
/* end footerPic */

/* ... smarty ... */
$smarty->display( $cfg['template']['dir_template'] . "public/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "join.tpl"   );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "footer.tpl" );
/*.. end smarty ..*/

include ("./includes/" . "require" . "/" . "site_foot.php");
?>
