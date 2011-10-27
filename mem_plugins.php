<?php
		#----------------------------------------
		# fwd.php
		#----------------------------------------
		# This script is used for platinumfeed. You do not need to change it.
		# Put this script in your members area.
		# You need to add your ID and program ID in your linking code.
		# Linking code can be obtained from platinumfeeds.com after you login.
		# The linking Code likes this: fwd.php?pid=5&cid=ABCDEFG1234
		# Last modified:    2005-09-14
		# Version:   1.2
		#
		# CHANGELOG:
		#   1.0: Initial release
		#   1.1: Added of QUERY_STRING.
		#   1.2: Add Error Handling, Support for local time, HTML redirect
		# platinumbucks   Peter     peterhe@platinumbucks.com

		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		$secret = '02lLu5OEzRlzg';
		$fp = @fopen("http://access.platinumfeeds.com/data.php", "r");
		while (!@feof($fp)) {
    		$timestamp = @fgets($fp, 128);
			break;
		}
		@fclose($fp);
		if($_ENV["QUERY_STRING"])
			$pcid = $_ENV["QUERY_STRING"];
		else if (getenv("QUERY_STRING"))
			$pcid = getenv("QUERY_STRING");
		else if($_SERVER["QUERY_STRING"])
			$pcid = $_SERVER["QUERY_STRING"];
		else if($HTTP_SERVER_VARS["QUERY_STRING"])
			$pcid = $HTTP_SERVER_VARS["QUERY_STRING"];
		else {
			$pid = $_GET["pid"];
			$cid = $_GET["cid"];
			$pcid = "pid=$pid&cid=$cid";
		}
		if($timestamp)
			$key = md5(md5($timestamp) . $secret);
		else
			$key = "&d=" . date("Ymd") . md5(md5(date("YmdHis")) . $secret) . date("His");
	
		$url = "http://access.platinumfeeds.com/entry.html?$pcid&k=$key";

		if(!headers_sent()) {
			header("Location: $url");
		}
		?>
<html>
  <head>
    <title>Platinumfeeds.com</title>
    <meta http-equiv="refresh" content="2;url=<?= $url ?>">
  </head>
  <body>
    <h2>Platinumfeeds.com</h2>
    If you are not automatically redirected in 2 seconds, please <a href="<?= $url ?>">Click Here</a> to continue to Platinumfeeds.com.
  </body>
</html>