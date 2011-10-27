<?php
define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

$tags = $db->get_results("SELECT * FROM tblTagCount ORDER BY RAND() LIMIT 10");
$tag_sum = $db->get_var("SELECT tag_sum FROM tblCounter LIMIT 1");

$smarty->assign('tags', $tags);
$smarty->assign('tag_sum', $tag_sum);
$smarty->display( $cfg['template']['dir_template'] . "ajax/" . "tag_cloud.tpl" );
