{include file="site/dirtyflirting/login/menu.tpl"}
<table class="center">
	<tr>
		<td class="fastsearch" style="vertical-align: top;">
			{include file="site/dirtyflirting/login/leftside.tpl"}
		</td>
		<td style="vertical-align: top;">
		 <table width="568" border="0" cellpadding="0" cellspacing="0">
			 <tr>
				 <td height="3" width="568"></td>
			 </tr>
			 <tr style="padding: 5px 5px 5px 5px;">
				 <td width="568"	align="center">
					 <table width="550" border="0" cellpadding="0" cellspacing="0">
						 <tr>
							 <td height="8" width="109" background="{$cfg.template.url_template}login/images/mailfolders_top.gif"></td>
							 <td width="11"></td>
							 <td height="8" width="430" background="{$cfg.template.url_template}login/images/maildisplay_top.gif"></td>
						 </tr>
						 <tr>
							 <td height="100" width="109" align="center" valign="top" >
								 <table align="center" width="100" border="0" cellpadding="0" cellspacing="0" class="join_text">
									 <tr>
										 <td align="center" width="50">
										 </td>
										 <td align="left" width="50">
											 <a href="{$cfg.path.url_site}mem_mail.php?folder=inbox" class="join_text">{if $folder == 'inbox'}<b>Inbox</b>{else}Inbox{/if}</a>
										 </td>
									 </tr>
									 <tr><td colspan="2" height="12"></td></tr>
									 <tr>
										 <td align="center" width="50">
										 </td>
										 <td align="left" width="50">
											 <a href="{$cfg.path.url_site}mem_mail.php?folder=outbox" class="join_text">{if $folder == 'outbox'}<b>Outbox</b>{else}Outbox{/if}</a>
										 </td>
									 </tr>
									 <tr><td colspan="2" height="12"></td></tr>
									 <tr>
										 <td align="center" width="50">
										 </td>
										 <td align="left" width="50">
											 <a href="{$cfg.path.url_site}mem_mail.php?folder=trash" class="join_text">{if $folder == 'trash'}<b>Trash</b>{else}Trash{/if}</a>
										 </td>
									 </tr>
									 <tr><td colspan="2" height="20"></td></tr>
									 <tr>
										 <td colspan="2"></td>
									 </tr>
									 <tr><td colspan="2" height="20"></td></tr>
									 <tr>
										 <td align="center" width="50">
										 </td>
										 <td align="left" width="50">
											 <a href="{$cfg.path.url_site}mem_sendmail.php" class="join_text">New<br>Message</a>
										 </td>
									 </tr>
								 </table>
							 </td>
							 <td width="11"></td>
							 <td width="430" align="center" >
								 <table height="220" width="430" border="0" cellpadding="0" cellspacing="0" class="join_text">
									 <form method="post">
									 <tr height="30" style="padding-left: 7px;">
										 <td colspan="2" valign="top" align="left"></td>
									 </tr>
									 <tr height="30" style="padding-right: 7px;">
										 <td width="210" align="right" class="join_text">Receive Message notification:</td>
										 <td align="left" class="join_text">
											 <input type="radio" name="email" value="Y" id="emailyes" {if $emailoptions.emailnotif == "Y"} checked {/if}> <label for="emailyes">Yes</label>	<input type="radio" name="email" value="N" id="emailno" {if $emailoptions.emailnotif == "N"} checked {/if}> <label for="emailno">No</label>
										 </td>
									 </tr>
									 <tr height="30" style="padding-right: 7px;">
										 <td align="right" class="join_text">Receive Flirt notification:</td>
										 <td align="left" class="join_text">
											 <input type="radio" name="whisper" value="Y" id="whisperyes" {if $emailoptions.whispernotif == "Y"} checked {/if}> <label for="whisperyes">Yes</label>	<input type="radio" name="whisper" value="N" id="whisperno" {if $emailoptions.whispernotif == "N"} checked {/if}> <label for="whisperno">No</label>
										 </td>
									 </tr>
									 <tr height="30" style="padding-right: 7px;">
										 <td align="right" class="join_text">Receive Newsletter emails:</td>
										 <td align="left" class="join_text">
											 <input type="radio" name="newsletter" value="Y" id="newsletteryes" {if $emailoptions.newsletternotif == "Y"} checked {/if}> <label for="newsletteryes">Yes</label>	<input type="radio" name="newsletter" value="N" id="newsletterno" {if $emailoptions.newsletternotif == "N"} checked {/if}> <label for="newsletterno">No</label>
										 </td>
									 </tr>
									 <tr height="100" style="padding-left: 7px;">
										 <td colspan="2" align="center" class="join_text"><input name="submit" type="submit" value="Update"></td>
									 </tr>
									 </form>
								 </table>
							 </td>
						 </tr>
						 <tr>
							 <td height="8" width="109"></td>
							 <td width="11"></td>
							 <td height="8" width="430"></td>
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