<?php
define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

echo '<div style="float:right;" >
			<a href="javascript:;" onclick="$(\'#picture_popup\').jqmHide();$(\'#picture_popup\').remove()" title="Close">
				<img src="'.$cfg['path']['url_site'].'js/jqm_close.gif" border="0">
			</a>
	  </div>';

$photo_id = (int)$_GET['id'];
$photo = $db->get_row("SELECT * FROM tblPhotos WHERE id = '$photo_id' AND `approved` = 'Y' LIMIT 1");

if(!(int) $photo['id']){
	echo "<script>$('#picture_popup').jqmHide();$('#picture_popup').remove()</script>";
}

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], ($_SESSION['sess_id'] && ($_SESSION['sess_id'] == $photo['user_id'])) ? 0 : VIEW_PUBLIC_PHOTOS);

$smarty->assign('photo', $photo);
$smarty->display("{$cfg['template']['dir_template']}ajax/picture_popup.tpl");

?>