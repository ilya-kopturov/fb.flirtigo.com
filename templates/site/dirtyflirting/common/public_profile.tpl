{* $Id: public_profile.tpl 417 2008-06-01 16:13:58Z andi $ *}

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
     <td class="fastsearch" valign="top" style="paddin:0;margin:0;">
       {include file="site/dirtyflirting/login/leftside.tpl" show_cams="Y"}
     </td>
     <td valign="top" align="left">
     {* MEMBER PAGE - RIGHT - *}
	<div class="redtitle">{$profile.screenname}</div>
	<div id="profile">
		<ul>
			<li><a href="{$cfg.path.url_site}ajax_public_profile.php?{rnd_md5}&id={$profile.id}" title="Profile"><span>Profile</span></a></li>
			<li><a href="{$cfg.path.url_site}ajax_public_pictures.php?{rnd_md5}&id={$profile.id}&p={$smarty.get.p}" title="Pictures"><span>Photos</span></a></li>
			<li><a href="{$cfg.path.url_site}ajax_public_videos.php?{rnd_md5}&id={$profile.id}&v={$smarty.get.v}" title="Videos"><span>Videos</span></a></li>
			<li><a href="{$cfg.path.url_site}ajax_private_gallery.php?{rnd_md5}&id={$profile.id}&g={$smarty.get.g}&filter={$smarty.get.filter}" title="Private Gallery"><span>Private Gallery</span></a></li>
		</ul>
	</div>

     {* MEMBER PAGE - RIGHT - FINISH *}
     </td>
   </tr>
 </table>

{literal}
<script type="text/javascript">
	$('#profile > ul').tabs({
		remote: true,
		spinner: ''
	});
 	</script>
{/literal}