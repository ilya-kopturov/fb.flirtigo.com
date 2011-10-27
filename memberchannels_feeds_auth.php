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
		
		$page                =addslashes($_GET["page"]);        
		$sex                 =addslashes($_GET["sex"]);    
		$niche_id            =addslashes($_GET["niche_id"]);    
		$img_width           =addslashes($_GET["img_width"]);   
		$show_number         =addslashes($_GET["show_number"]); 
		$feeds_type          =addslashes($_GET["feeds_type"]);  
		$player_type         =addslashes($_GET["player_type"]); 
		$order_type          =addslashes($_GET["order_type"]);  
		$sort_type           =addslashes($_GET["sort_type"]);   
		$paging              =addslashes($_GET["paging"]);
		$paging_color        =addslashes($_GET["paging_color"]);
		$call_id		         =addslashes($_GET["call_id"]);
		$gourl               =addslashes($_GET["gourl"]);
		$cid                 =addslashes($_GET["cid"]);
		$play_type           =addslashes($_GET["play_type"]);
		$choose_type         =addslashes($_GET["choose_type"]);
		$background          =addslashes($_GET["MCB_background"]);
		$scene_background    =addslashes($_GET["MCB_scene_background"]);
		$img_board           =addslashes($_GET["img_board"]);
		$text_colo           =addslashes($_GET["text_colo"]);
		$text_size           =addslashes($_GET["text_size"]);
		$title_color         =addslashes($_GET["title_color"]);
		$title_size          =addslashes($_GET["title_size"]);
		$padding             =addslashes($_GET["padding"]);
		$upgrade_url         =addslashes($_GET["upgrade_url"]);
		$style               =addslashes($_GET["style"]);
		$trialnum            =addslashes($_GET["trialnum"]);
		$niche               =addslashes($_GET["niche"]);
		$exclude_niche       =addslashes($_GET["exclude_niche"]);
		$player              =addslashes($_GET["player"]);
		$niches_list         =addslashes($_GET["niches_list"]);
		$star_list           =addslashes($_GET["star_list"]);
		$show_title          =addslashes($_GET["show_title"]);
		$show_desc           =addslashes($_GET["show_desc"]);
		$show_production_year=addslashes($_GET["show_production_year"]);
		$show_length         =addslashes($_GET["show_length"]);
		$show_stars          =addslashes($_GET["show_stars"]);
		$show_director       =addslashes($_GET["show_director"]);
		$show_studio         =addslashes($_GET["show_studio"]);
		$scene               =addslashes($_GET["scene"])?addslashes($_GET["scene"]):1;
		$player_h            =addslashes($_GET["player_h"])?addslashes($_GET["player_h"]):560;
		$player_w            =addslashes($_GET["player_w"])?addslashes($_GET["player_w"]):420;
		$player_sidebar      =addslashes($_GET["player_sidebar"])?addslashes($_GET["player_sidebar"]):1;
		$player_button       =addslashes($_GET["player_button"])?addslashes($_GET["player_button"]):1;
		if(!$gourl) {
			if(addslashes($_SERVER["QUERY_STRING"]))
				$str = addslashes($_SERVER["QUERY_STRING"]);
			else
				$str = "page=$page&sex=$sex&niche_id=$niche_id&img_width=$img_width&show_number=$show_number&scene=$scene&feeds_type=$feeds_type&player_type=$player_type&order_type=$order_type&sort_type=$sort_type&paging=$paging&paging_color=$paging_color&call_id=$call_id&gourl=$gourl&cid=$cid&play_type=$play_type&choose_type=$choose_type&background=$background&scene_background=$scene_background&img_board=$img_board&text_color=$text_color&text_size=$text_size&title_color=$title_color&title_size=$title_size&padding=$padding&upgrade_url=$upgrade_url&style=$style&trialnum=$trialnum&niche=$niche&exclude_niche=$exclude_niche&player=$player&niches_list=$niches_list&star_list=$star_list&show_title=$show_title&show_desc=$show_desc&show_production_year=$show_production_year&show_length=$show_length&show_stars=$show_stars&show_director=$show_director&show_studio=$show_studio&MCB_background=$background&MCB_scene_background=$scene_background&player_h=$player_h&player_w=$player_h&player_sidebar=$player_sidebar&player_button=$player_button";
			$host= "feeds.memberchannels.com";
			//$path = "/ajax_v2.php?customer_id=$customer_id&key=$key&$str";
			$path = "/ajax_indepth.php?customer_id=$customer_id&key=$key&$str";
			$port = 80;
			$out = "GET $path HTTP/1.0\r\nHost: $host\r\n\r\n";
			$fp = fsockopen($host, $port, $errno, $errstr, 30);
			fwrite($fp, $out);
				while (!feof($fp)) {
				$res .= fgets($fp, 128);
			}
			fclose($fp);
			$response = preg_split('/(Content-Type\:.+?)[\r\n]+/i', $res, -1, PREG_SPLIT_DELIM_CAPTURE);
			echo $response[2];
			exit;
		}
		$fp = @fopen("http://member.memberchannels.com/phpdata.php", "r");
		while (!@feof($fp)) {
    		$timestamp = @fgets($fp, 128);
			break;
		}
		@fclose($fp);

		if($_ENV["QUERY_STRING"])
			$cat = $_ENV["QUERY_STRING"];
		else if (getenv("QUERY_STRING"))
			$cat = getenv("QUERY_STRING");
		else if($_SERVER["QUERY_STRING"])
			$cat = $_SERVER["QUERY_STRING"];
		else if($HTTP_SERVER_VARS["QUERY_STRING"])
			$cat = $HTTP_SERVER_VARS["QUERY_STRING"];
		else
			$cat="cat=".$_GET["cat"]."&t=".$_GET["t"];
		if($timestamp)
			$key = md5(md5($timestamp) . $secret);
		else
			$key = "&d=" . date("Ymd") . md5(md5(date("YmdHis")) . $secret) . date("His");
		$url = "http://feeds.memberchannels.com/feeds_auth.php?c=$customer_id&a=$access_code&k=$key&cid=$cid";
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