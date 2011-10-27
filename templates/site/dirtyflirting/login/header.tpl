<html>
    <head>
        <title>FlirtiGo Adult Dating and Personals{if $profile} - {$profile.screenname}{/if}</title>

        <link rel="stylesheet" type="text/css" href="{$cfg.template.url_template}login/css/style.css">
        <link rel="stylesheet" type="text/css" href="{$cfg.template.url_template}public/css/style.css">
        <link rel="stylesheet" type="text/css" href="{$cfg.template.url_template}login/css/member.css">
        <link rel="stylesheet" type="text/css" href="{$cfg.template.url_template}login/css/bonus_plug.css">

        <script type="text/javascript" src="{$cfg.template.url_template}login/js/functions.js"></script>
        <script type="text/javascript" src="{$cfg.template.url_template}login/js/rounded_corners_lite.inc.js"></script>
        <script type="text/javascript" src="{$cfg.template.url_template}login/js/cufon-yui.js"></script>
        <script type="text/javascript" src="{$cfg.template.url_template}login/js/VenetoHand_500.font.js"></script>

        {include file="site/dirtyflirting/common/js+css.tpl"}

        {literal}
        <script type="text/javascript">
            $(document).ready(function() {
                setInterval(function() {
                    $('#mail_messages_count').load('{/literal}{$cfg.path.url_site}ajax_check_mail.php{literal}');
                }, 5 * 60 * 1000);
                Cufon.replace('.container_text.caption', {
                    fontFamily : 'VenetoHand'
                });
                Cufon.replace('.redtitle', {
                    fontFamily : 'VenetoHand'
                });
            });
        </script>
        {/literal}

    </head>
    <body onLoad="window.scrollTo(0,0);">
        <div id="fb-root"></div>
        <script type="text/javascript">
            window.fbAsyncInit = function() {ldelim}
            FB.init({ldelim}
            appId      : appId,
            //channelURL : '//WWW.YOUR_DOMAIN.COM/channel.html',
            status     : false, // check login status
            cookie     : true, // enable cookies to allow the server to access the session
            oauth      : true, // enable OAuth 2.0
            xfbml      : true  // parse XFBML
            {rdelim});
        
            // Additional initialization code here
            {rdelim};
    
            // Load the SDK Asynchronously
            (function(d) {ldelim}
            var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {ldelim}return;{rdelim}
            js = d.createElement('script'); js.id = id; js.async = true;
            js.src = "//connect.facebook.net/en_US/all.js";
            d.getElementsByTagName('head')[0].appendChild(js);
            {rdelim} (document));
        </script>
        <table class="center header">
            <tr>
                <td class="h_pic">
                    <a href="{$cfg.path.url_site}{if $smarty.session.sess_id}mem_{/if}index.php"/><img src="{$cfg.template.url_template}login/images/hornybook_header.gif" border="0"></a>
                </td>
                <td style="vertical-align: bottom; text-align: right;" class="logout">
                   [<!-- <i>{$smarty.session.sess_screenname}</i> |  --><a href="{$logout_url}" class="logout">Logout</a>]
                </td>
            </tr>
        </table>
        {include file="site/dirtyflirting/login/error.tpl"}
