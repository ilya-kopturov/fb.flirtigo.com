{include file="site/dirtyflirting/login/menu.tpl"}

<table style="margin-left: auto; margin-right: auto; width: 744px;" cellpadding="0" cellspacing="0">
	<tr>
        <td style="padding: 0;">
		{if $smarty.get.msg}
			 <table class="error" style="width: 568px" cellpadding="0" cellspacing="0">
				 <tr>
					 <td class="h_error">
						 <div class="errorTextSmall" align="center">{$smarty.get.msg}</div>
					 </td>
				 </tr>
			 </table>
		{/if}
			 <table style="width: 744px;" cellpadding="0" cellspacing="0">
				 <tr>
					 <td class="redtitle" style="padding-bottom: 15px; text-align: left;">Whos Online</td>
				 </tr>
			 </table>
			 <table class="memberstable normaltext" style="width: 744px;" cellpadding="0" cellspacing="0">
				 <tr>
					 <td align="center" >
						 <table style="width: 500px;" cellpadding="0" cellspacing="0">
						 <form name="whosonline" method="get">
						 	<input type="hidden" name="online" value="1">
							 <tr style="padding: 25px 5px 15px 10px;">
								 <td width="200" align="center" valign="middle" class="search_text">
									 Search for &nbsp;<select name="sex" class="search_input" style="width: 100px;">{html_options options=$cfg.profile.sex selected=$get.sex}</select>
								 </td>
								 <td width="300" align="center" valign="middle" class="search_text">
									 Looking for &nbsp;<select name="looking" class="search_input" style="width: 100px;">{html_options options=$cfg.profile.sex selected=$get.looking}</select>
								 </td>
							 </tr>
							 <tr style="padding: 5px 5px 10px 10px;">
								 <td colspan="2" align="center" valign="middle" class="search_text">
									 <input type="checkbox" name="withpicture" value="Y" {if $get.withpicture == 'Y'}checked{/if}> only show members with picture or videos
								 </td>
							 </tr>
							 <tr style="padding: 5px 5px 10px 5px;">
								 <td align="center" colspan="2"><input src="{$cfg.template.url_template}login/images/dirtyflirting_button_search.gif" type="image" name="submit"></td>
							 </tr>
						 </form>
						 </table>
					 </td>
				 </tr>								 
			 </table>
			 <table cellpadding="0" cellspacing="0" border="0"><tr><td height="10px"></td></tr></table>
			 {include file="site/dirtyflirting/login/resultsection.tpl"}
		</td>
	</tr>
</table>