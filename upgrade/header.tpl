<html>
 <head>
  <title>FlirtiGo Adult Dating and Personals{if $profile} - {$profile.screenname}{/if}</title>

	<link rel="stylesheet" type="text/css" href="{$cfg.template.url_template}login/css/style.css">
	<link rel="stylesheet" type="text/css" href="{$cfg.template.url_template}public/css/style.css">
	<link rel="stylesheet" type="text/css" href="{$cfg.template.url_template}login/css/member.css">

	<script type="text/javascript" src="{$cfg.template.url_template}login/js/functions.js"></script>
	<script type="text/javascript" src="{$cfg.template.url_template}login/js/rounded_corners_lite.inc.js"></script>

	{include file="site/dirtyflirting/common/js+css.tpl"}

	{literal}
	<script>
		$(document).ready(function() {
			setInterval(function() {
				$('#mail_messages_count').load('{/literal}{$cfg.path.url_site}ajax_check_mail.php{literal}');
			}, 5 * 60 * 1000);
		});
	</script>
	{/literal}

 </head>
 <body onLoad="window.scrollTo(0,0);">

   <table class="center header">
     <tr>
       <td class="h_pic">
       	<a href="{$cfg.path.url_site}{if $smarty.session.sess_id}mem_{/if}index.php"/><img src="{$cfg.template.url_template}login/images/hornybook_header.gif" border="0" width="369" height="79"></a>
       </td>
       <td style="vertical-align: bottom; text-align: right;" class="logout">
         [ <i>{$smarty.session.sess_screenname}</i> | <a href="{$cfg.path.url_site}mem_logout.php" class="logout">Logout</a> ] <img src="{$cfg.template.url_template}login/images/hornybook_loginitem.jpg" border="0" alt="FlirtiGo.com" align="absmiddle" />
       </td>
     </tr>
   </table>

   {include file="site/dirtyflirting/login/error.tpl"}