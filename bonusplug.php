<?php
/* $Id$ */

define("IN_MAINSITE", TRUE);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);


list($url) = @mysql_fetch_row( mysql_query("SELECT url FROM tblMembersClub where id=".$_GET['id']));

$smarty->assign('url', $url);

//$smarty->display("{$cfg['template']['dir_template']}login/header.tpl" );
$smarty->display("{$cfg['template']['dir_template']}login/plugin.tpl" );
//$smarty->display("{$cfg['template']['dir_template']}login/footer.tpl" );

include ("includes/require/site_foot.php");

?>