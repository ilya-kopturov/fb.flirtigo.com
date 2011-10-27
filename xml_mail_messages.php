<?php
/* $Id: xml_mail_messages.php 542 2008-06-13 18:36:42Z andi $ */

define("IN_MAINSITE", true);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

$page = $_GET['page'] ? $_GET['page'] : 1; // get the requested page
$limit = $_GET['rows'] ? $_GET['rows'] : 10; // get how many rows we want to have into the grid
$sidx = $_GET['sidx'] ? $_GET['sidx'] : 'date_sent'; // get index row - i.e. user click to sort
$sord = $_GET['sord'] ? $_GET['sord'] : 'DESC'; // get the direction
$f = (empty($_GET['f']) || !(in_array($_GET['f'], range(1, 5)))) ? 1 : $_GET['f'];

if ($f == 4) {
	$count = $db->get_var("SELECT COUNT(*) FROM tblMails WHERE user_id = '{$_SESSION['sess_id']}' AND folder = '1' AND type = 'F'");
} else {
	$count = $db->get_var("SELECT COUNT(*) FROM tblMails WHERE user_id = '{$_SESSION['sess_id']}' AND folder = '$f' AND type != 'F'");
}
$total_pages = ($count > 0) ? ceil($count / $limit) : 0;
if ($page > $total_pages) $page = $total_pages;
$start = $limit * $page - $limit; // do not put $limit*($page - 1)

if ($f == 4) {
	$emails = $db->get_results("SELECT * FROM tblMails WHERE user_id = '{$_SESSION['sess_id']}' AND folder = '1' AND type = 'F' ORDER BY $sidx $sord LIMIT $start , $limit");
} else {
	$emails = $db->get_results("SELECT * FROM tblMails WHERE user_id = '{$_SESSION['sess_id']}' AND folder = '$f' AND type != 'F' ORDER BY $sidx $sord LIMIT $start , $limit");
}

$xml = new SimpleXMLElement("<?xml version='1.0' standalone='yes'?><rows/>");
$xml->addChild('page', $page);
$xml->addChild('total', $total_pages);
$xml->addChild('records', $count);
if (is_array($emails)) {
	foreach($emails as $email) {
		$row = $xml->addChild('row');
		$row->addAttribute('id', $email['id']);
		$new = "<span title='" . ($email['new'] == 'Y' ? 'New message' : 'Read message') . "'><img src='{$cfg['path']['url_site']}templates/site/dirtyflirting/login/images/" . ($email['new'] == 'Y' ? 'dirtyflirting_mailnew.gif' : 'dirtyflirting_mailread.gif') . "' alt='" . ($email['new'] == 'Y' ? 'New message' : 'Read message') . "'>";
		$new = $email['type'] == 'F' ? "<span title='Dirty Flirt'><img src='{$cfg['path']['url_site']}templates/site/dirtyflirting/login/images/dirtyflirting_flirt.gif'></span>" : $new;
		$video = $photo = false;
		if (($email['multimedia'] == 'V') || ($email['multimedia'] == 'M')) {
			$video = "<span title='Message contains video'><img src='{$cfg['path']['url_site']}templates/site/dirtyflirting/login/images/dirtyflirting_mailvideo.gif' style='width:21px;height:19px;'></span>";
		}
		if (($email['multimedia'] == 'I') || ($email['multimedia'] == 'M')) {
			$photo = "<span title='Message contains image'><img src='{$cfg['path']['url_site']}templates/site/dirtyflirting/login/images/dirtyflirting_mailpicture.gif' style='width:21px;height:19px;'></span>";
		}
		$row->addChild('cell', $new);
		$row->addChild('cell', $video);
		$row->addChild('cell', $photo);
		$style = $email['new'] == 'Y' ? ' style="font-weight:bold"' : '';
		$row->addChild('cell', "<span $style>" . ($f == 2 ? smarty_screenname(array('user_id' => $email['user_to'])) : smarty_screenname(array('user_id' => $email['user_from']))) . "</span>");
		$row->addChild('cell', "<span title=\"View Message\"" . $style . ">" . $email['subject'] . "</span>");
		//$row->addChild('cell', "<span $style>" . date_format(new DateTime($email['date_sent']), 'D, m/d/y h:i A') . '</span>');
		$row->addChild('cell', "<span $style>" . $email['date_sent'] . '</span>');
	}
}

header("Content-type: text/xml");
print $xml->asXML();
