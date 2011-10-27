<style type="text/css">
@import url("{$cfg.template.url_template}public/css/style.css");
@import url("{$cfg.template.url_template}login/css/style.css");
@import url("{$cfg.template.url_template}login/css/member.css");
</style>

<table class="center">
  <tr>
     <td colspan="2" class="menu menu_text">
{if $site_section eq 'public'}
 <table>
   <tr>
     <td style="width: 45px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}index.php" target="_parent">Home</a></td>
     <td>/</td>
     <td style="width: 75px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}join.php" target="_parent">Free Join</a></td>
     <td>/</td>
     <td style="width: 60px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}join.php" target="_parent">Browse</a></td>
     <td>/</td>
     <td style="width: 60px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_support}" target="_blank">Support</a></td>
     <td>/</td>
     <td style="width: 50px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}join.php" target="_parent">Login</a></td>
   </tr>
 </table>
{else}
{include file="site/dirtyflirting/login/menu.tpl"}
{/if}
     </td>
   </tr>
   <tr>
     <td>
     	<div class="generic_container" style="text-align:center">
     		You are not allowed <span style="padding-left: 10px;"><a href="{$cfg.path.url_upgrade}?id={$smarty.session.sess_id}"><img src="{$cfg.template.url_template}login/images/dirtyflirting_upgradenow.gif" alt="FlirtiGo.com Upgrade" style="vertical-align: middle; border: 0px;" /></a></span>
     	</div>
     </td>
   </tr>
</table>