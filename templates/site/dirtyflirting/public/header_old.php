<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>
		{if !empty($smarty.get.tag)}
			Adult Dating and Personals tagged with {$smarty.get.tag}
		{elseif $profile}
			{$profile.screenname|escape:"html"}, {age birthday=$profile.birthdate}, {$cfg.profile.sex[$profile.sex]}, adult dating and personals in {$profile.city|escape:"html"}, {$cfg.countries[$profile.country]}
		{else}
			FlirtiGo Adult Dating, Sex Date and Personals site
		{/if}
	</title>
    <meta name="description" content="Adult Dating and personals for people looking for casual sex and sex dates">
    <meta name="keywords" content="dating, adult dating, adult personals, married, sex date, sex dating, adult date"> 
    <META NAME="abstract" CONTENT="Adult Dating & Personals">
	<META HTTP-EQUIV="Content-Language" CONTENT="EN">
	<META NAME="revisit-after" CONTENT="5 days">
	<META NAME="copyright" CONTENT="Copyright Hornybook.com">
	<META NAME="AUTHOR" CONTENT="FlirtiGo.com">
	<META NAME="COPYRIGHT" CONTENT="� 2007-2009 FlirtiGo.com">
	<META NAME="Classification" CONTENT="adult dating, dating, personals">
	<META NAME="Distribution" CONTENT="General">
	<META NAME="robots" CONTENT="FOLLOW,INDEX">
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=iso-8859-1">
	<meta name="verify-v1" content="wKMnsBkgZIQYa54Zz+TTokHtAQvac8uWgqwC5KMAiy8=" />
	<link rel="stylesheet" type="text/css" href="/templates/site/dirtyflirting/public/css/style.css">
	<link rel="stylesheet" type="text/css" href="/templates/site/dirtyflirting/login/css/member.css">

	<script type="text/javascript" src="{$base_url}templates/site/dirtyflirting/public/js/functions.js"></script>
	{include file="site/dirtyflirting/common/js+css.tpl"}
</head>
<body onLoad="window.scrollTo(0,0);">

{* preload images *}
<div class="hiddenPic">
	<img src="/js/busy.gif">
	<img src="/js/jqm_close.gif">
	<img src="{$base_url}templates/site/dirtyflirting/public/images/redstar.gif">
	<img src="{$base_url}templates/site/dirtyflirting/public/images/graystar.gif">
</div>

{* load Flag *}
<div class="center">
  <img src="{$base_url}templates/site/dirtyflirting/public/images/hornybook_{$userArea.area|lower}flag.jpg" style="width: 746px; border: 0px;" alt="FlirtiGo.com" title="FlirtiGo.com" />
</div>

<div class="clear"><img src="{$base_url}images/pixel.gif" height="0" width="0" /></div>

{* load Header Pic *}
<div class="center" id="pub_header">
    <form method="post" action="/login.php">
	<div class="logo_container">
		<a href="/{if $smarty.session.sess_id}mem_{/if}index.php"/><img src="{$base_url}templates/site/dirtyflirting/login/images/hornybook_header.gif" alt="FlirtiGo.com" /></a>
	</div>
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
	</form>
</div>

<div class="clear"><img src="{$base_url}images/pixel.gif" height="0" width="0" /></div>

{include file="site/dirtyflirting/public/error.tpl"}
