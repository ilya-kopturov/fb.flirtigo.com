<?php
/* DIRTYFLIRTING.COM */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

session_unregister("sess_id");
session_unregister("sess_screenname");
session_unregister("sess_sex");
session_unregister("sess_looking");
session_unregister("sess_accesslevel");
session_unregister("sess_rating");
session_unregister("sess_stats");
session_unregister("sess_newmails");

session_destroy();

//echo 'aaaaa';
//return;
//header_location($cfg['path']['url_site']);
print "<script type='text/javascript'>top.location = '" . $cfg['facebook']['canvas_url'] . "'</script>";

include ("./includes/" . "require" . "/" . "site_foot.php");
?>