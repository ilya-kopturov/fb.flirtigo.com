<table width="571" height="32" border="0" cellpadding="0" cellspacing="0" class="details_text">
	<tr>
		<td width="75" align="center" valign="middle" class="membershipno_text">Online users:</td>
		<td width="80" align="left" valign="middle" style="padding: 0px 5px 0px 5px;">{$smarty.session.sess_online}</td>
		<td width="164" align="left" valign="middle" style="padding: 0px 5px 0px 5px;">Your Rate: <strong>{$smarty.session.sess_votes}</strong> Votes (<strong>{$smarty.session.sess_rating|string_format:"%.2f"}</strong>)<br><a href="{$cfg.path.url_site}mem_mail.php" class="details_text" >{if $smarty.session.sess_newmails > 0} <span id="c" style="text-decoration: underline;">{$smarty.session.sess_newmails} Messages waiting</span>{else} {$smarty.session.sess_newmails} Messages waiting {/if}</a></td>
		<td width="110" align="left" valign="middle" style="padding: 0px 5px 0px 5px;">Account Type:<br><strong>{$cfg.option.members[$smarty.session.sess_accesslevel]}</strong></td>
		<td width="110" align="center"><a href="{$cfg.path.url_upgrade}?id={$smarty.session.sess_id}">UPGRADE</a></td>
	</tr>
</table>