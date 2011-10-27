<div class="generic_container clearfix" id="profile_hot-block">
	<div class="redtitle">Who Viewed Me</div>
</div>
<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
<div>
	{foreach name=users from=$users item=user}
	<div class="clearfix" style="float:left;{if $smarty.foreach.users.index mod 2 eq 0}margin-right:5px{/if}">
	  <table class="memberstable normaltext" width="365" height="120" border="0" cellpadding="0" cellspacing="0">
		     <tr>
				   <td width="85">
				     <table cellpadding="0" cellspacing="0" border="0">
				       <tr style="padding-top: 5px; padding-left: 10px;">
				         <td>
							<a href="{$cfg.path.url_site}profile/{$user.screenname}">
								<img src="{$cfg.path.url_site}showphoto.php?id={$user.id}&m=Y&t=r&p=1" border="1" style="border-color: #FFFFFF; width: 75px; height: 75px;">
							</a>
				         </td>
				       </tr>
				       <tr style="padding-top: 5px; padding-left: 10px; padding-bottom: 5px;">
				         <td style="text-align: left;">Rating: <br /> {rateme id=$user.id screenname=$user.screenname rating=$user.rating}</td>
				       </tr>
				     </table>
				   </td>
				   <td>
				     <table cellpadding="0" cellspacing="0" border="0" width="100%">
				       <tr style="padding-top: 5px; padding-left: 10px;">
				         <td style="text-align: left; color: #900202;" class="normaltext">
				         	<img src="{$cfg.template.url_template}login/images/dirtyflirting_mailpicture.gif" alt="FlirtiGo.com" style="border: 0px; vertical-align: middle;" />
				         	<img src="{$cfg.template.url_template}login/images/dirtyflirting_mailvideo.gif" alt="FlirtiGo.com" style="border: 0px; vertical-align: middle;" />
				         	{$user.screenname}
				         </td>
				       </tr>
				       <tr style="padding-top: 2px; padding-left: 10px;">
				         <td style="text-align: left; color: #900202;" class="normaltext">
				           {age birthday=$user.birthdate} yr old {assign var="sex" value=$user.sex}{$cfg.profile.sex[$sex]}
				         </td>
				       </tr>
				       <tr style="padding-top: 2px; padding-left: 10px;">
				         <td style="text-align: left;" class="normaltext">
				           Location: {location type="short" typeloc=$user.typeloc city=$user.city country=$user.country joined=$user.joined}
				         </td>
				       </tr>
				       <tr style="padding-top: 2px; padding-left: 10px;">
				         <td style="text-align: left;" class="normaltext">
				           Looking For: {looking looking=$user.looking}
				         </td>
				       </tr>
				       <tr style="padding-top: 2px; padding-left: 10px;">
				         <td style="text-align: left;" class="normaltext">
				           Summary: {if $user.introtitle}{$user.introtitle|truncate:30:"..."}{else}Ask Me.{/if}
				         </td>
				       </tr>
				       <tr style="padding-top: 2px; padding-left: 10px;">
				         <td style="text-align: left;" class="normaltext">
				           <div style="float:left">Last Login: {lastlogin lastlogin=$user.lastlogin}</div>
				           <div style="float:right;margin-right:5px;"><a href="{$cfg.path.url_site}profile/{$user.screenname}">[more]</a></div>
				         </td>
				       </tr>
				     </table>
				   </td>
			 </tr>
	  </table>
	  {if $smarty.foreach.users.index mod 2}<div class="clear"><img src="{$cfg.image.pixel}" height="5"></div>{/if}
	</div>
	{foreachelse}
	<div style="text-align:center">Empty List.</div>
	{/foreach}
	{if $pager->links}
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div style="text-align:right">{$pager->links}</div>
	{/if}
</div>