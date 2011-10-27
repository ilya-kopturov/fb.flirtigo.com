<?php
/* DIRTYFLIRTING.COM


                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");

echo "<html>";
echo "<head>";
echo "<title>FlirtiGo.com - Featured Profile</title>";
echo "</head>";
echo "<body bgcolor='0' topmargin='0' bottommargin='0' leftmargin='0' rightmargin='0'>";
echo "<table border='0' cellpadding='0' cellspacing='0'>";
echo "<tr>";
echo "<td style='padding: 5px 5px 5px 5px;'>";

$featured = @$db->get_results("SELECT `id`, `screenname` FROM `tblUsers` WHERE `featured` = 'Y'");

for($i=0; $i<count($featured); $i++)
{
	echo "<a target='_parent' href='".$cfg['path']['url_site']."profile/".urlencode($featured[$i]['screenname'])."'><img src='". $cfg['path']['url_site']."showphoto.php?id=".$featured[$i]['id']."&m=Y&t=r&p=1' border='1' style='border-color: #FFFFFF;' alt='".$featured[$i]['screenname']."'>";
	echo "</td>";
	echo "<td style='padding: 5px 5px 5px 5px;'>";
}

echo "</tr>";
echo "</table>";
echo "</body>";
echo "</html>";
?>