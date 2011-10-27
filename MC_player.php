<?php
		#----------------------------------------
		# auth.php
		#----------------------------------------
		# This script is used for memberchannels feeds. You do not need to change it.
		# Put this script in your members area with other js and css files.
		# Last modified:    2007-10-20
		# Version:   1.0
		#
		# CHANGELOG:
		#   1.0: Initial release
		# memberchannels   Peter     peter@memberchannels.com

		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		$cid              =addslashes($_GET["cid"]);
		$mid              =addslashes($_GET["mid"]);
		$mod              =addslashes($_GET["mod"]);
		$player_w         =addslashes($_GET["player_w"]);
		$player_h         =addslashes($_GET["player_h"]);
		$player_sidebar   =addslashes($_GET["player_sidebar"]);
		$player_button    =addslashes($_GET["player_button"]);
		$bgcolor          =addslashes($_GET["bg"]);
		$secret = '52kXTwZwhLAGU';
		$customer_id = '427';
		$access_code = 'Vbvxhej';
		$host= "member.memberchannels.com";
		$path = "/phpdata.php";
		$port = 80;
		$out = "GET $path HTTP/1.0\r\nHost: $host\r\n\r\n";
		$fp = fsockopen($host, $port, $errno, $errstr, 30);
		fwrite($fp, $out);
		while (!feof($fp)) {
			$stme_str[] = fgets($fp, 64);
		}
		fclose($fp);
		$timestamp = $stme_str[8];
		if($timestamp)
			$key = md5(md5($timestamp) . $secret);
		else
			$key = "&d=" . date("Ymd") . md5(md5(date("YmdHis")) . $secret) . date("His");
		$url = "http://feeds.memberchannels.com/ajax_play_auth.php?customer=$customer_id&a=$access_code&k=$key&mid=$mid&cid=$cid&play_type=$mod&h=$player_h&w=$player_w&s=$player_sidebar&b=$player_button&bg=$bgcolor";
		if(!headers_sent()) {
			header("Location: $url");
		}
?>
<html>
  <head>
    <title>memberchannels.com</title>
    <meta http-equiv="refresh" content="2;url=<?= $url ?>">
  </head>
  <body>
    <h2>memberchannels.com</h2>
    If you are not automatically redirected in 2 seconds, please <a href="<?= $url ?>">Click Here</a> to continue to feeds.memberchannels.com.
  </body>
</html>	