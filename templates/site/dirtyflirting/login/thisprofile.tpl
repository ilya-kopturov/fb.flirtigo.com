 <form name="emailprofile" method="post" action="mem_emailprofile.php?id={$id}">
 <input type="hidden" name="searchtype" value="guest">
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
							 <td width="568" align="center">
								 <table width="560" border="0" cellpadding="0" cellspacing="0">
									 <tr style="padding: 5px 5px 5px 5px;">
										 <td align="left" valign="bottom">
										 </td>
									 <tr style="padding: 15px 5px 35px 25px;">
										 <td align="left" class="details_text">Send <b>"{screenname user_id=$id}"</b> profile to your friend.</td>
									 </tr>
									 </tr>
								 <table>
								 <table width="560" border="0" cellpadding="0" cellspacing="0">
									 <tr style="padding: 5px 5px 5px 10px;">
										 <td width="160" align="right" valign="middle" class="search_text">
											 Your friend name:
										 </td>
										 <td width="400" align="left" valign="middle">
											 <input type="text" name="friend_name" class="search_input" style="width: 200px;">
										 </td>
									 </tr>
									 <tr style="padding: 5px 5px 5px 10px;">
										 <td width="160" align="right" valign="middle" class="search_text">
											 Enter Email Address:
										 </td>
										 <td width="400" align="left" valign="middle">
											 <input type="text" name="friend_email" class="search_input" style="width: 200px;">
										 </td>
									 </tr>
									 <tr style="padding: 15px 5px 5px 10px;">
										 <td width="160" align="right" valign="top" class="search_text">
											 Select a Message:
										 </td>
										 <td width="400" align="left" valign="middle" class="details_text">
											 <input type="radio" name="friend_message" value="Check out this hot profile i found at FlirtiGo!" checked><label>Check out this hot profile i found at FlirtiGo!</label> <br/>
											 <input type="radio" name="friend_message" value="Check this profile out and come join in the fun at FlirtiGo!"><label>Check this profile out and come join in the fun at FlirtiGo</label>	<br/>
											 <input type="radio" name="friend_message" value="You just have to check this profile out, its crazy!"><label>You just have to check this profile out, its crazy!</label>
										 </td>
									 </tr>
									 <tr style="padding: 25px 5px 15px 10px;" class="search_text">
										 <td align="center" colspan="2">
											 <table width="460">
												 <tr>
													 <td align="center"><img src="{$cfg.path.url_site}verify.php" border="1"><br/> Cant read? <span onclick="document.emailprofile.submit();" style="cursor: hand;"><u>Refresh</u></span></td>
													 <td align="left">Enter the code: <br> <input type="text" name="emailprofile_code" class="search_input"></td>
												 </tr>
											 </table>
										 </td>
									 </tr>
									 <tr style="padding: 15px 5px 13px 5px;">
										 <td align="center" colspan="2"><input name="submit_x" type="submit" value="Submit"></td>
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
 </form>