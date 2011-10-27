<?php
/* DIRTYFLIRTING.COM  */

define("IN_MAINSITE", TRUE);

include ($cfg['path']['dir_include'] . "require" . "/" . "site_head.php");

// redirect to fb login page if user logged in  facebook? but Session expired

if($fb_user_id && (!isset($_SESSION['login_type']))) {
    header("Location: " . $cfg['path']['url_site'] . "fb_login.php");
}
if(isset($_SESSION['login_type']) && $_SESSION['login_type'] > 0) {
    header("Location: " . $cfg['path']['url_site'] . "mem_index.php");
}

/* ... featured faces ... */
$featured = @$db->get_results("SELECT u.`id`, u.`screenname`, u.`country`, u.`city`, u.`typeloc`, u.`typeusr`, 
                                      u.`joined`, u.`birthdate`
                               FROM   `tblUsers` u 
                               WHERE ( u.`sex` = '1' or  u.`sex` = '0') AND 
                                      u.`featured` = 'Y'
                               ORDER BY rand() 
                               LIMIT  15");
$featured = array_merge($featured, range(count($featured), 15));
/* ..end featured faces.. */

/* ... top rated ... */
$toprated = @$db->get_results("SELECT u.`id`, u.`screenname`, u.`country`, u.`city`, u.`typeloc`, u.`typeusr`, 
                                      u.`joined`, u.`birthdate`
                               FROM   `tblUsers` u 
                               WHERE  ( u.`sex` = '1' or  u.`sex` = '0') AND 
                                      u.`withpicture` = 'Y'
                               ORDER BY u.`rating` DESC
                               LIMIT  15");
$toprated = array_merge($toprated, range(count($toprated), 15));
/* ..end top rated.. */

/* ... assign ... */
$smarty->assign("page", "join");

$smarty->assign("days",   range(1,31));
$smarty->assign("months", array(1 => "January",2 => "February" ,3 =>  "March"   ,4 => "April"    ,5 => "May"      ,6 => "June",7 => "July",
                                8 => "August" ,9 => "September",10 => "October",11 => "November",12 => "December"));
$smarty->assign("years",  range(date("Y")-18,1908));

$smarty->assign("countries", $cfg['countries']);
$smarty->assign("states",    $cfg['states']);

$smarty->assign("featured",  $featured);
$smarty->assign("toprated",  $toprated);

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

$tags = $db->get_results("SELECT * FROM tblTagCount ORDER BY RAND() LIMIT 10");
$tag_sum = $db->get_var("SELECT tag_sum FROM tblCounter LIMIT 1");

$smarty->assign('tags', $tags);
$smarty->assign('tag_sum', $tag_sum);

/*.. end assign ..*/

/* ... smarty ... */
$smarty->register_function('age', 'smarty_age');

$smarty->display( $cfg['template']['dir_template'] . "public/" . "header.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "index.tpl" );
$smarty->display( $cfg['template']['dir_template'] . "public/" . "footer.tpl" );

$smarty->unregister_function('age');
/*.. end smarty ..*/

include ($cfg['path']['dir_include'] . "require" . "/" . "site_foot.php");
?>
