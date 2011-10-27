 <table width="205" height="195" border="0" cellpadding="0" cellspacing="0">
	 <tr>
		 <td height="20" align="center" valign="top" style="padding: 5px 7px 5px 6px">
			 HOT OR NOT
		 </td>
	 </tr>
	 <tr>
		 <td height="100" align="center" valign="middle">
			 <a href="{$cfg.path.url_site}mem_profile.php?id={$rateme.id}"><img width="70" height="70" src="showphoto.php?id={$rateme.id}&m=Y&t=r&p=1" border="0" style="border: 1px solid Black;"></a>
		 </td>
	 </tr>
	 {if $rateme.rating && $rateme.screenname}
	 <tr>
		 <td align="center" valign="middle" height="55" class="hotornot_text">
			 Rating: <b>{$rateme.votes|string_format:"%d"}</b> Votes (<b>{$rateme.rating|string_format:"%.2f"}</b>) <br/>
			 User ID: <b>{$rateme.screenname}</b> <br/>
			 <a href="{$cfg.path.url_site}mem_profile.php?id={$rateme.id}" class="hotornot_text"><u>more...</u></a>
		 </td>
	 </tr>
	 {/if}
 </table>