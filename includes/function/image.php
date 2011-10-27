<?
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */


function checkpicture()
{
	global $cfg, $_FILES;
	
	if (is_uploaded_file($_FILES['photo_file']['tmp_name']) AND isset($_FILES['photo_file']['tmp_name']))
	{
		$picture_size = getimagesize($_FILES['photo_file']['tmp_name']);
		if ($picture_size[0] < 200 OR $picture_size[1] < 200){
			return "Photo must be at least 200x200 px!";
		}
		if ($picture_size[0] > 1000 OR $picture_size[1] > 1000){
			return "Photo must be at most 1000x1000 px!";
		}
         
		if ($_FILES['photo_file']['size'] > ceil($cfg['option']['picture_size'] * 1024 * 1024))
			return "<br />File to big. Maximum file size: " . $cfg['option']['picture_size'] . " MB.";
	}
	elseif ($_FILES['photo_file']['tmp_name'] == "" or $_FILES['photo_file']['size'] == 0)
	{
		return "Unknown file type.";
	}
	else
	{
		return "Uknown Error.";
	}
     
	return 0;
}

function upload_picture($db, $pic_name, $pic_description)
{
	global $cfg, $_FILES;
	 
	if (is_uploaded_file($_FILES['photo_file']['tmp_name']) AND isset($_FILES['photo_file']['tmp_name']))
	{
		@$db->query("INSERT INTO tblPhotos (`user_id`, `photo_name`, `photo_description`, `upload_ip`) 
			         VALUES ('" . $_SESSION['sess_id'] . "', '" . $pic_name . "', '" . $pic_description ."', '" . $_SERVER['REMOTE_ADDR'] . "')"
		);
		$pic_tblid = mysql_insert_id(); 
        
		$sFile_ = $cfg['path']['dir_photos'] . $_SESSION['sess_id'] . "_" . $pic_tblid . "_";
		$im = new Image();
        
		if ($im->load($_FILES['photo_file']['tmp_name']))
		{
			$im->resize($cfg['image']['b_x'], $cfg['image']['b_y'], $cfg['image']['watermark'], $cfg['image']['watermark_size']);
			$im->save($sFile_ . "b.jpg", $cfg['image']['quality']);
		}
		if ($im->load($_FILES['photo_file']['tmp_name']))
		{
			$im->resize($cfg['image']['m_x'], $cfg['image']['m_y'], $cfg['image']['watermark'], $cfg['image']['watermark_size']);
			$im->save($sFile_ . "m.jpg", $cfg['image']['quality']);
		}
		if ($im->load($_FILES['photo_file']['tmp_name']))
		{
			$im->resize($cfg['image']['s_x'], $cfg['image']['s_y'], $cfg['image']['watermark'], 0);
			$im->save($sFile_ . "s.jpg", $cfg['image']['quality']);
		}
		if ($im->load($_FILES['photo_file']['tmp_name']))
		{
			$im->resize($cfg['image']['r_x'], $cfg['image']['r_y'], $cfg['image']['watermark'], 0);
		}
	}
}

function delete_picture($db, $pic_id)
{
	global $cfg;
	
	$pic_tblid = @$db->get_var("SELECT `id` FROM `tblPhotos` WHERE `user_id` = '" . $_SESSION['sess_id'] . "' LIMIT 1 OFFSET " . ($pic_id - 1));
	
	$sFile_ = $cfg['path']['dir_photos'] . $_SESSION['sess_id'] . "_" . $pic_tblid . "_";
	
	@unlink($sFile_ . "b.jpg");
	@unlink($sFile_ . "m.jpg");
	@unlink($sFile_ . "s.jpg");
	
	@$db->query("DELETE FROM `tblPhotos` WHERE `user_id` = '" . $_SESSION['sess_id'] . "' AND `id` = '" . $pic_tblid . "' LIMIT 1");
}
?>