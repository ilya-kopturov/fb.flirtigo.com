<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>
            FlirtiGo Adult Dating, Sex Date and Adult Personals site
        </title>
        <meta name="description" content="FlirtiGo is top social networking site for adult dating and personals for people looking for casual sex and sex dates">
        <meta name="keywords" content="Hornybook, Horny Book, dating, adult dating, online dating, vietnamese dating, dating chat, internet dating, horny housewives, adult social network, adult social networking, adult personals, married sex, married personals, live cams, live sex webcams, adult live webcam, live sex webcams, sex date, sex dating, adult date"> 
        <META NAME="abstract" CONTENT="Adult Dating & Personals">
        <META HTTP-EQUIV="Content-Language" CONTENT="EN">
        <META NAME="revisit-after" CONTENT="5 days">
        <META NAME="copyright" CONTENT="Copyright Hornybook.com">
        <META NAME="AUTHOR" CONTENT="FlirtiGo.com">
        <META NAME="COPYRIGHT" CONTENT="2007-2009 FlirtiGo.com">
        <META NAME="Classification" CONTENT="adult dating, dating, personals">
        <META NAME="Distribution" CONTENT="General">
        <META NAME="robots" CONTENT="FOLLOW,INDEX">
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=iso-8859-1">
        <meta name="verify-v1" content="wKMnsBkgZIQYa54Zz+TTokHtAQvac8uWgqwC5KMAiy8=" />
        <link rel="stylesheet" type="text/css" href="/templates/site/dirtyflirting/public/css/style.css">
        <link rel="stylesheet" type="text/css" href="/templates/site/dirtyflirting/login/css/member.css">

        <script type="text/javascript" src="{$base_url}templates/site/dirtyflirting/public/js/functions.js"></script>
        <script type="text/javascript" src="{$cfg.template.url_template}login/js/cufon-yui.js"></script>
        <script type="text/javascript" src="{$cfg.template.url_template}login/js/VenetoHand_400.font.js"></script>
        <script type="text/javascript" src="{$cfg.template.url_template}public/js/js.js"></script>

        {include file="site/dirtyflirting/common/js+css.tpl"}
        <script type="text/javascript">
            var appId = '{$app_id}';
            var BASE_URL = '{$base_url}';
        </script>
        <script type="text/javascript" src="{$base_url}js/fb_auth.js"></script>
    </head>
    <body onLoad="window.scrollTo(0,0);">
        <div id="fb-root"></div>
        {* preload images *}
        <div class="hiddenPic">
            <img src="/js/busy.gif">
            <img src="/js/jqm_close.gif">
            <img src="{$base_url}templates/site/dirtyflirting/public/images/redstar.gif">
            <img src="{$base_url}templates/site/dirtyflirting/public/images/graystar.gif">
        </div>

        {* load Flag *}
        <div class="center">
            <br>
        </div>

        <div class="clear"><img src="{$base_url}images/pixel.gif" height="0" width="0" /></div>

        {* load Header Pic *}
        <div class="center" id="pub_header">
            <form method="post" action="/login.php">
                <div class="logo_container2">
                    <a href="/{if $smarty.session.sess_id}mem_{/if}index.php"><img src="{$base_url}templates/site/dirtyflirting/login/images/hornybook_header.gif" alt="FlirtiGo.com" /></a>
                </div>
                {if $sess_id == 0}
                <div class="login_container">
                    <div class="input_container">
                        <input type="text" name="screenname" value="{if $screen_name != ''}{$screen_name}{else}Username{/if}" class="header" onFocus="this.value='';" />
                    </div>
                    <div class="clear" style="width: 2px; height: 5px;"></div>
                    <div class="input_container">
                        <input type="password" name="pass" class="header" value="Password" onFocus="this.value='';" />
                    </div>
                    <div style="float: left; height: 27px;">
                        <input type="image" src="{$base_url}templates/site/dirtyflirting/public/images/hornybook_blogin.gif" style="border: 0px;" alt="Login" />
                    </div>
                    <div class="clear"></div>
                    <div class="forgot_assword">
                        <a href="/password.php">Forgot Password?</a>
                    </div>
                </div>
                {else}
                <div class="logout_container">
                    [<a href="{$logout_url}" class="logout">Logout</a>]
                </div>
                {/if}
            </form>
            <!--<div class="fb_login_button"><fb:login-button scope="email,user_about_me,user_activities,user_hometown,user_interests,user_likes,user_location,user_notes,user_online_presence,user_photo_video_tags,user_photos,user_videos,user_status,user_religion_politics,user_birthday,status_update,publish_stream" ></fb:login-button></div>-->
        </div>

        <div class="clear"><img src="{$base_url}images/pixel.gif" height="0" width="0" /></div>

        {include file="site/dirtyflirting/public/error.tpl"}
