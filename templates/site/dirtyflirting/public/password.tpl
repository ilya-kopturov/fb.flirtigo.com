{include file="site/dirtyflirting/public/menu.tpl"}

<form method="post">
<div class="center">
<table class="generic_container" width="746" border="0" cellpadding="10" cellspacing="0" align="center">
	<tr>
		<td align="left" valign="middle">
			<div class="title">Password Reminder</div>
			<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
			<div style="font-size: 12px; font-family: 'Trebuchet MS';">
				<div>Enter your email address that you used to sign up with
				and we'll send you a copy of your username and password.</div>
				<div>If you no longer have access to your original email address,
				please <a href="{$cfg.path.url_support}" target="_blank"><b>click here</b></a> to report it to the
				support team.</div>
			</div>
			<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="5"></div>
			<div>
				<span style="font-weight: bold;font-size:14px;font-weight:bold; font-family:'Trebuchet MS';">Email</span>:
				<input type="text" name="email" class="join_form" style="width:150px;">
				<input type="submit" name="forgot_submit" value="Get password">
			</div>
		</td>
	</tr>
</table>
</div>
</form>