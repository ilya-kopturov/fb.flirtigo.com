 {if $users}
 
 {if $result_nav}
 <table width="573" height="24" border="0" cellpadding="0" cellspacing="0">
	 <tr>
		 <td align="center">{$result_nav}</td>
	 </tr>
 </table>
 {/if}
 
 <table><tr><td height="2"></td></tr></table>
 
 {section name="user" loop=$users}
 <table width="572" border="0" cellspacing="0" cellpadding="0">
	 <tr>
		 <td width="7">&nbsp;</td>
		 <td align="center" valign="middle" width="558" height="50"	class="join_text">
			 <table width="558" border="0" cellpadding="0" cellspacing="0">
				 <tr>
					{*<td width="80" align="center">
						 <table width="75" border="0" cellpadding="0" cellspacing="0">
							 <tr>
								 <td width="75" height="51" align="center" background="{$cfg.template.url_template}login/images/round.gif" class="membership_text">
									 <b>{$users[user].id}</b>
								 </td>
							 </tr>
							 <tr>
								 <td height="30" align="center">
									 {online user_id=$users[user].id}
								 </td>
							 </tr>
						 </table>
					 </td> *}
					 <td width="170" align="left" valign="top" style="padding: 5px 2px 5px 5px;">
						 <table width="170" border="0" cellpadding="0" cellspacing="0">
							 <tr style="padding-top: 6px; padding-bottom: 2px;">
								 <td><a href="{$cfg.path.url_site}mem_profile.php?id={$users[user].id}"><img src="{$cfg.path.url_site}showphoto.php?id={$users[user].id}&m=Y&t=r&p=1" border="1" style="border-color: #FFFFFF;"></a></td>
								 <td><a href="{$cfg.path.url_site}mem_profile.php?id={$users[user].id}"><img src="{$cfg.path.url_site}showvideo.php?id={$users[user].id}&m=Y&t=r&p=1" border="1" style="border-color: #FFFFFF;"></a></td>
							 </tr>
						 </table>
					 </td>
					 <td width="190" align="left" valign="middle" style="padding: 5px 2px 5px 5px;">
						 <b>Guest ID:</b> {$users[user].screenname}<br>
						 <b>Gender:</b> {assign var="sex" value=$users[user].sex}{$cfg.profile.sex[$sex]}<br>
						 <b>Location:</b> {location type="short" typeloc=$users[user].typeloc city=$users[user].city country=$users[user].country}<br>
						 <b>Age:</b> {age birthday=$users[user].birthdate}<br> 
						 <b>Height:</b> {assign var="height" value=$users[user].height}{$cfg.profile.height[$height]}<br>
						 <b>Weight:</b> {assign var="weight" value=$users[user].weight}{$cfg.profile.weight[$weight]}<br>
						 <b>Looking for:</b> {looking looking=$users[user].looking}<br>
						 <b>Introduction:</b> {if $users[user].introtitle and $users[user].approved == 'Y'}{$users[user].introtitle|truncate:80:"..."}{else}Ask Me.{/if}<br>
					 </td>
					 <td width="1"></td>
					 <td width="116" align="left" valign="middle" style="padding: 5px 1px 5px 0px;">
						 <table border="0" cellpadding="3" cellspacing="2">
							 <tr>
								 <td>
									 <a href="{$cfg.path.url_site}mem_profile.php?id={$users[user].id}" class="join_text"><b><u>View Full profile</u></b></a>
								 </td>
							 </tr>
							 <tr>
								 <td>
									 <a href="{$cfg.path.url_site}mem_sendmail.php?id={$users[user].id}" class="join_text"><b><u>Send Message</u></b></a>
								 </td>
							 </tr>
							 <tr>
								 <td>
									 <a href="{$cfg.path.url_site}mem_sendflirt.php?id={$users[user].id}" class="join_text"><b><u>Free Quick Flirt</u></b></a>
								 </td>
							 </tr>
							 <tr>
								 <td>
									 {adddelete user_id=$smarty.session.sess_id friend_user_id=$users[user].id}
								 </td>
							 </tr>
							 <tr>
								 <td>
									 <a href="{$cfg.path.url_site}{if $users[user].withpicture == 'Y'}mem_viewphotos.php?id={$users[user].id}&p=1{elseif $users[user].withvideo == 'Y'}mem_viewvideos.php?id={$users[user].id}&p=1{else}mem_mostwanted.php{/if}" class="join_text"><b><u>Rate Profile</u></b></a>
								 </td>
							 </tr>
						 </table>
					 </td>
				 </tr>
			 </table>
		 </td>
		 <td width="7">&nbsp;</td>
	 </tr>
 </table>
 <table><tr><td height="2"></td></tr></table>
 {/section}
 
 {if $result_nav}
 <table width="573" height="24" border="0" cellpadding="0" cellspacing="0">
	 <tr>
		 <td align="center" class="resultnav_text">{$result_nav}</td>
	 </tr>
 </table>
 {/if}
 
 {else}
 
 <table width="572" border="0" cellspacing="0" cellpadding="0">
	 <tr>
		 <td width="7">&nbsp;</td>
		 <td align="center" valign="middle" width="558" height="50"	class="join_text"><strong>No results found.</strong></td>
		 <td width="7">&nbsp;</td>
	 </tr>
 </table>
 
 {/if}