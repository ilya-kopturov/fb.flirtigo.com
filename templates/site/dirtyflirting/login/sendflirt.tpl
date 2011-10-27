 <tr>
	 <td align="center" valign="top">
	 	<table width="780" border="0" cellpadding="0" cellspacing="0">
			 <tr>
				 <td valign="top" align="center" width="205">
					 {include file="site/dirtyflirting/login/menu.tpl"}
					 <table><tr><td height="2"></td></tr></table>
				 </td>
				 <td width="2"></td>
				 <td valign="top" align="center" width="573">
					 {include file="site/dirtyflirting/login/details.tpl"}
					 <table><tr><td height="2"></td></tr></table>
					 <table width="568" border="0" cellpadding="0" cellspacing="0">
						 <tr>
							 <td height="3" width="568"></td>
						 </tr>
						 <tr>
							 <td width="568"	align="center">
								 <table width="560" border="0" cellpadding="0" cellspacing="0">
									 <tr style="padding: 5px 5px 5px 5px;">
										 <td colspan="2" width="560" align="left" valign="bottom">
										 </td>
									 </tr>
									 <tr style="padding: 5px 10px 5px 20px;">
										 <td colspan="2" width="560" align="left" valign="bottom" class="myprofile_text">
											 <b>Send a Free Instant Quick Flirt to <a href="{$cfg.path.url_site}mem_profile.php?id={$user.id}" class="myprofile_text">{$user.screenname}</a>:</b>
										 </td>
									 </tr>
									 <tr style="padding: 5px 10px 5px 20px;">
										 <td colspan="2" width="560" align="left" valign="bottom" class="myprofile_text">
											 Just select the most appropiate image and message and hit Send. <br>
											 {$user.screenname} will see the message in their mailbox.
										 </td>
									 </tr>
									 <tr style="padding: 5px 10px 20px 20px;">
										 <td colspan="2" width="560" align="left" valign="bottom" class="myprofile_text">
											 <b>Prefer to send a more personalized message? <br>
											 Send a email to <a href="{$cfg.path.url_site}mem_sendmail.php?id={$user.id}" class="myprofile_text">{$user.screenname}</a> instead!</b>
										 </td>
									 </tr>
									 <tr style="padding: 5px 10px 5px 20px;">
									 {section name="whisper" loop=$whispers}
										 <td width="280" align="left" valign="bottom" class="myprofile_text">
											 <table border="0" cellpadding="2" cellspacing="0" class="myprofile_text">
												 {if $whispers[whisper].id}
												 <form method="post">
												 <input type="hidden" name="whisper" value="{$whispers[whisper].id}">
												 <input type="hidden" name="id" value="{$user.id}">
												 <tr>
													 <td><img border="0" src="{$cfg.path.url_site}images/{$whispers[whisper].id}.gif"></td>
													 <td>
														 <table border="0" cellpadding="0" cellspacing="0">
															 <tr valign="top"><td><b>{$whispers[whisper].whisper}</b></td></tr>
															 <tr valign="bottom"><td>&nbsp;<input name="send_whisper_x" type="submit" value="Send"></td></tr>
														 </table>
													 </td>
												 </tr>
												 </form>
												 {/if}
											 </table>
										 </td>
										 {if $smarty.section.whisper.iteration % 2 == 0}
											 </tr>
											 <tr style="padding: 5px 10px 5px 20px;">
										 {/if}
									 {/section}
									 </tr>
								 </table>
							 </td>
						 </tr>
						 <tr>
							 <td height="3" width="568"></td>
						 </tr>
					 </table>
				 </td>
			 </tr>
		 </table>
	 </td>
 </tr>