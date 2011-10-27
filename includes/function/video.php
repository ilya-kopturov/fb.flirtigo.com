<?
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */


function checkvideo()
{
	global $cfg, $_FILES;
	
	if (is_uploaded_file($_FILES['video_file']['tmp_name']) AND isset($_FILES['video_file']['tmp_name']))
	{
		if ($_FILES['video_file']['size'] > ceil($cfg['option']['video_size'] * 1024 * 1024))
			return "<br />File to big. Maximum file size: " . $cfg['option']['video_size'] . " MB.";
	}
	elseif ($_FILES['video_file']['tmp_name'] == "" or $_FILES['video_file']['size'] == 0)
	{
		return "Unknown file type.";
	}
	else
	{
		return "Uknown Error.";
	}
    
	return 0;
}

function upload_video($db, $video_name, $video_description)
{
	global $cfg, $_FILES;
	 
	if (is_uploaded_file($_FILES['video_file']['tmp_name']) AND isset($_FILES['video_file']['tmp_name']))
	{
		$ext = pathinfo($_FILES['video_file']["name"]);
		
		@$db->query("INSERT INTO tblVideos (`user_id`, `video_name`, `video_description`, `video_ext`) 
			         VALUES ('" . $_SESSION['sess_id'] . "', '" . $video_name . "', '" . $video_description ."', '" . $ext['extension'] . "')"
		);
		
		$video_tblid = mysql_insert_id(); 
        
		$sFile = $cfg['path']['dir_videos'] . $_SESSION['sess_id'] . "_" . $video_tblid . "." . $ext['extension'];
		
		move_uploaded_file($_FILES['video_file']["tmp_name"], $sFile);
	}
}

function delete_video($db, $video_id)
{
	global $cfg;
	
	$video_tblid  = @$db->get_var("SELECT `id` FROM `tblVideos` WHERE `user_id` = '" . $_SESSION['sess_id'] . "' LIMIT 1 OFFSET " . ($video_id - 1));
	$video_tblext = @$db->get_var("SELECT `id` FROM `tblVideos` WHERE `user_id` = '" . $_SESSION['sess_id'] . "' AND `id` = '" . $video_tblid . "'");
	
	$sFile = $cfg['path']['dir_videos'] . $_SESSION['sess_id'] . "_" . $video_tblid . $video_tblext;
	
	@unlink($sFile);
	
	@$db->query("DELETE FROM `tblVideos` WHERE `user_id` = '" . $_SESSION['sess_id'] . "' AND `id` = '" . $video_tblid . "' LIMIT 1");
}
?>