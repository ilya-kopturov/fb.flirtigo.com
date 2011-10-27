{include file="site/dirtyflirting/login/menu.tpl"}
 
<table class="center" id="sendmail">
	<tr>
		<td>
			 <table cellpadding="0" cellspacing="0" class="sendmail_header">
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
			<table class="memberstable normaltext" style="width: 760px;" cellpadding="0" cellspacing="0">
				<form name="sendmail" method="post">
				<input type="hidden" name="to" value="{$to}">
				<tr style="text-align: left; padding: 3px 10px;">
					<td><b>Reply To:</b> {$to}</td>
				</tr>
				<tr style="text-align: left; padding: 3px 10px;">
					<td><span style="color: #7D0000;"><b>Message type:</b></span> Standard</td>
				</tr>
				<tr style="text-align: left; padding: 3px 10px;">
					<td><b>Subject:</b> &nbsp; <input type="text" name="subject" value="{$subject}" class="subject" maxlength="50" /></td>
				</tr>
				<tr style="text-align: left; padding: 3px 10px;">
					<td><textarea name="message" class="message">{$message}</textarea></td>
				</tr>
				<tr style="text-align: left; padding-top: 3px; padding-left: 650px; padding-bottom: 15px;">
					<td class="featuredBoxLink">[ <input type="submit" name="sendmessage" class="sendmessage" /> ]</td>
				</tr>
				</form>
			</table>
		</td>
	</tr>
</table>