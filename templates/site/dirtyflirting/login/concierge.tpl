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
					<table width="571" height="32" border="0" cellpadding="0" cellspacing="0" class="details_text">
						<tr>
							<td width="75" align="center" valign="middle" class="membershipno_text"></td>
							<td width="80" align="left" valign="middle" style="padding: 0px 5px 0px 5px;"></td>
							<td width="1" bgcolor="#978373"></td>
							<td width="164" align="left" valign="middle" style="padding: 0px 5px 0px 5px;">Your Rate is <strong>{$smarty.session.sess_rating|string_format:"%d"}/10</strong><br><a href="{$cfg.path.url_site}mem_mail.php" class="details_text" style="color: red; font-weight: bold; text-decoration: underline;">{$smarty.session.sess_newmails} Messages waiting</a></td>
							<td width="1" bgcolor="#978373"></td>
							<td width="110" align="left" valign="middle" style="padding: 0px 5px 0px 5px;">Your Account Type<br><strong>{$cfg.option.members[$smarty.session.sess_accesslevel]}</strong></td>
							<td width="110" align="center"><a href="{$cfg.path.url_upgrade}?id={$smarty.session.sess_id}">UPGRADE</a></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>