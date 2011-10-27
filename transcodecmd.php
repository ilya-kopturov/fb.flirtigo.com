<?php
set_time_limit(0);
set_include_path(".:includes:/usr/share/php:/usr/share/pear");
define("IN_MAINSITE", TRUE);

include('includes/require/site_head.php');
include('System/Command.php');

list($script, $video_id, $tmpFile) = $argv;
$tmpFile = $cfg['path']['dir_upload'] . $tmpFile;
$exitCode = 1;

//syslog(LOG_INFO, var_export($argv, true));

$video = $db->get_row("SELECT * FROM tblVideos WHERE id = '$video_id' LIMIT 1");

print_r($video);

if ($video) {
	$tmpOutput = md5(SECRET . microtime() . SECRET);
	$output = "{$cfg['path']['dir_upload']}$tmpOutput";
	
	//$cmd_mplayer  = "{$cfg['path']['cmd_mplayer']} $tmpFile -ss 1 -nosound -vo jpeg:outdir={$cfg[path][dir_videos]}thumb/{$video[id]}/ -frames 1";
	
// hhu	$cmd_mplayer =  "/usr/local/bin/ffmpeg -y -i $tmpFile -f image2 -ss 0.160 -vframes 1 -an ".$cfg['path']['dir_videos'] . "thumb" . "/" .$vid.".jpg";
$cmd_mplayer =  "/usr/local/bin/ffmpeg -y -i ".$tmpFile." -f image2 -ss 0.160 -vframes 1 -an ".$cfg['path']['dir_videos']."thumb/".$video[id]."/00000001.jpg";	
	//$cmd_mencoder = "{$cfg['path']['cmd_mencoder']} $tmpFile -o $output -of lavf -oac mp3lame -lameopts abr=56 -ovc lavc -lavcopts vcodec=flv:vbitrate=800:mbd=2:mv0:trell:v4mv:cbp:last_pred=3 -lavfopts format=flv -vf scale=320:260 -srate 22050";

	
//	$cmd_mencoder = "/usr/local/bin/ffmpeg  -i $tmpFile  -aspect 4:3  -b 30000 -r 12 -f flv -s 320x240 -an $output";
 $cmd_mencoder = "/usr/local/bin/ffmpeg  -i $tmpFile  -aspect 4:3  -b 30000 -r 12 -f flv -s 320x240  $output";
//	mail("mar@w2interactive.com","Transcode",$cmd_mencoder." //// ".$cmd_mplayer);

	@exec($cmd_mencoder, $cmd_mencoder_out, $cmd_mencoder_result);
	@exec($cmd_mplayer, $cmd_mplayer_out, $cmd_mplayer_result);
	
	if ($cmd_mencoder_result == 0 AND $cmd_mplayer_result == 0) {
		$newFile = $cfg['path']['dir_videos'] . $video['user_id'] . "_" . $video['id'] . '.flv';
		if (copy($output, $newFile)) $exitCode = 0;
	}
	
	unlink($tmpFile);
	unlink($output);
}

if ($exitCode && $video_id) copy("{$cfg[path][dir_photos]}novideo_f.jpg", "{$cfg[path][dir_videos]}thumbs/$video_id/00000001.jpg");

exit($exitCode);
?>
