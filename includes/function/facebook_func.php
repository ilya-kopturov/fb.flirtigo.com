<?php

require_once ($cfg['path']['dir_include'] . "require" . "/" . "Facebook/facebook.php");
$canvas_base_url = 'http://apps.facebook.com/flirtigo/';
$facebook = new Facebook(array(
    'appId' => $cfg['facebook']['app_id'],
    'secret' => $cfg['facebook']['app_secret'],
    //'canvas_page' => "https://apps.facebook.com/123456789/",
    //'cookie' => true,
));
$fb_user_id = null;
$fb_auth_url = null;
$fb_me = null;
// Get User ID
$fb_user_id = $facebook->getUser();

if ($fb_user_id) {
    try {
        $fb_me = $facebook->api('/me');
    } catch (Exception $e) {
        //print_r($e);
	echo "";
        $fb_user_id = null;
    }
}

if ($fb_user_id) {
    $fb_auth_url = $facebook->getLogoutUrl(
        array(
            'redirect_uri' => $cfg['path']['url_site'],
        )
    );
} else {
    $fb_auth_url = $facebook->getLoginUrl(
        array(
            'redirect_uri' => $cfg['path']['url_site'] . 'fb_login.php',
            'display' => 'page',
            'scope' => 'email,user_about_me,user_activities,user_hometown,user_interests,user_likes,user_location,user_notes,user_online_presence,user_photo_video_tags,user_photos,user_videos,user_status,user_religion_politics,user_birthday,status_update,publish_stream',
        )
    );
}
/* generate logout URL */
if (!$fb_user_id) {
    $logout_url = $cfg['path']['url_site'] . 'mem_logout.php';
} else {
    $logout_url = $facebook->getLogoutUrl(
        array(
            'next' => $cfg['path']['url_site'] . 'mem_logout.php',
        )
    );
}

//var_dump($fb_user_id);