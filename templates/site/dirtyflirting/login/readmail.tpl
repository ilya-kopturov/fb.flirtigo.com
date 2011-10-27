{include file="site/dirtyflirting/login/menu.tpl"}
 
<table class="center">
	<tr>
		<td style="vertical-align: top;">
			 <table cellpadding="0" cellspacing="0" style="	background-color: white; border: 0px; border-collapse: collapse; width: 760px; color: black;">
				 <tr style="padding-bottom: 10px;">
					 <td style="height: 23px; width: 75px;">
						 {if $folder == "inbox"}
							 <img src="{$cfg.template.url_template}login/images/dirtyflirting_inbox_active.gif" />
						 {else}
							 <a href="{$cfg.path.url_site}mem_mail.php?folder=inbox"><img src="{$cfg.template.url_template}login/images/dirtyflirting_inbox_inactive.gif" onmouseover="menu_mouseover('mail_inbox','{$cfg.template.url_template}login/images/dirtyflirting_inbox_on.gif');" onmouseout="menu_mouseout('mail_inbox','{$cfg.template.url_template}login/images/dirtyflirting_inbox_inactive.gif');" id="mail_inbox" /></a>
						 {/if}
					 </td>
					 <td class="featuredPopular2">
						 <img src="{$cfg.template.url_template}login/images/dirtyflirting_graypixel.gif" class="featuredPopular2" />
					 </td>
					 <td style="height: 23px; width: 80px;">
						 {if $folder == "outbox"}
							 <img src="{$cfg.template.url_template}login/images/dirtyflirting_outbox_active.gif" />
						 {else}
						 	<a href="{$cfg.path.url_site}mem_mail.php?folder=outbox"><img src="{$cfg.template.url_template}login/images/dirtyflirting_outbox_inactive.gif" onmouseover="menu_mouseover('mail_outbox','{$cfg.template.url_template}login/images/dirtyflirting_outbox_on.gif');" onmouseout="menu_mouseout('mail_outbox','{$cfg.template.url_template}login/images/dirtyflirting_outbox_inactive.gif');" id="mail_outbox" /></a>
						 {/if}
					 </td>
					 <td class="featuredPopular2">
						 <img src="{$cfg.template.url_template}login/images/dirtyflirting_graypixel.gif" class="featuredPopular2" />
					 </td>
					 <td style="height: 23px; width: 60px;">
						 {if $folder == "trash"}
							 <img src="{$cfg.template.url_template}login/images/dirtyflirting_trash_active.gif" />
						 {else}
							 <a href="{$cfg.path.url_site}mem_mail.php?folder=trash"><img src="{$cfg.template.url_template}login/images/dirtyflirting_trash_inactive.gif" onmouseover="menu_mouseover('mail_trash','{$cfg.template.url_template}login/images/dirtyflirting_trash_on.gif');" onmouseout="menu_mouseout('mail_trash','{$cfg.template.url_template}login/images/dirtyflirting_trash_inactive.gif');" id="mail_trash" /></a>
						 {/if}
					 </td>
					 <td style="height: 1px; width: 539px; vertical-align: bottom;">
						 <img src="{$cfg.template.url_template}login/images/dirtyflirting_graypixel.gif" style="width: 539px; height: 1px;" />
					 </td>
				 </tr>
			 </table>
			 <table class="memberstable normaltext" style="width: 760px;" cellpadding="4" cellspacing="1">
				 <tr style="text-align: center;">
					 <td width="150" valign="top">
						 <table cellpadding="0" cellspacing="0" width="150px">
							 <tr align="left" width="140px" style="padding-left: 10px;">
								 <td valign="top"><img src="{$cfg.path.url_site}showphoto.php?id={$email.user_from}&m=Y&t=r&p=1" width="75px" height="75px" alt="" /></td>
							 </tr>
							 <tr align="left" style="padding-left: 10px; padding-top: 10px;">
								 <td class="featuredBoxLink">[ <a href="{$cfg.path.url_site}mem_profile.php?id={$email.user_from}" class="featuredBoxLink">view full profile</a> ]</td>
							 </tr>
							 <tr align="left" style="padding-top: 40px; padding-left: 10px;">
								 <td class="featuredBoxLink">
								 {if $smarty.session.sess_id != $email.user_from}{addblock user_id=$smarty.session.sess_id friend_user_id=$email.user_from}{/if}
								 </td>
							 </tr>
						 </table>
					 </td>
					 <td width="610px" valign="top">
						 <table cellpadding="0" cellspacing="0" width="550px">
							 <tr align="left">
								 <td><b>Profile Name:</b> <a href="{$cfg.path.url_site}mem_profile.php?id={$email.user_from}">{screenname user_id=$email.user_from}</a></td>
							 </tr>
							 <tr align="left">
								 <td><b>Message type:</b> Standard</td>
							 </tr>
							 <tr align="left">
								 <td><b>Date:</b> {$email.date_sent|date_format:"%d %B %Y"}</td>
							 </tr>
							 <tr align="left">
								 <td style="padding: 10px 0px;"><b>Subject:</b> {if $email.subject}{$email.subject}{else}no subject{/if}</td>
							 </tr>
							 <tr align="left">
								 <td style="padding: 20px 0px;"><b>Message:</b> {if $smarty.session.sess_accesslevel == 0}<span class="featuredBoxLink">[ <a href="{$cfg.path.url_upgrade}?id={$email.user_from}">Click Here to view message</a> ]</span>{else}<br /><br />{$email.message|nl2br}{/if}</td>
							 </tr>
							 <tr align="right" valign="bottom">
								 <td class="featuredBoxLink">
									 [ <a href="{$cfg.path.url_site}mem_sendmail.php?id={$email.user_from}&e_id={$email.id}&reply=reply&replymessage.x=45" class="featuredBoxLink"><b>reply to message</b></a> ]
								 </td>
							 </tr>																		 
						 </table>
					 </td>
				 </tr>
			 </table>
		</td>
	</tr>
</table>