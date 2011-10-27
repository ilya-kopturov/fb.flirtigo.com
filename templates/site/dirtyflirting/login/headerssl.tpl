<html>
 <head>
  <title>FlirtiGo Adult Dating and Personals{if $profile} - {$profile.screenname}{/if}</title>

	<link rel="stylesheet" type="text/css" href="{$cfg.template.url_template_ssl}login/css/style.css">
	<link rel="stylesheet" type="text/css" href="{$cfg.template.url_template_ssl}public/css/style.css">
	<link rel="stylesheet" type="text/css" href="{$cfg.template.url_template_ssl}login/css/member.css">
	<script type="text/javascript" src="{$cfg.path.url_site_ssl}js/jquery.js"></script>
	<script type="text/javascript" src="{$cfg.template.url_template_ssl}login/js/functions.js"></script>
	<script type="text/javascript" src="{$cfg.template.url_template_ssl}login/js/rounded_corners_lite.inc.js"></script>

	{include file="site/dirtyflirting/common/js+css.tpl"}

 </head>
 <body onLoad="window.scrollTo(0,0);">

   <table class="center header">
     <tr>
       <td class="h_pic">
       	<a href="{$cfg.path.url_site}{if $smarty.session.sess_id}mem_{/if}index.php"/><img src="{$cfg.template.url_template_ssl}login/images/hornybook_header.gif" border="0"></a>
       </td>
       <td style="vertical-align: bottom; text-align: right;" class="logout">
         [ <i>{$screenname}</i> | <a href="{$logout_url}" class="logout">Logout</a> ] <img src="{$cfg.template.url_template_ssl}login/images/hornybook_loginitem.jpg" border="0" alt="FlirtiGo.com" align="absmiddle" />
       </td>
     </tr>
   </table>
   
   {include file="site/dirtyflirting/login/error.tpl"}