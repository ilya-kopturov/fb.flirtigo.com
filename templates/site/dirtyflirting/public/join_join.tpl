<tr>
	<td align="center" valign="top">
		 <table width="780" border="0" cellpadding="0" cellspacing="0">
			 <tr>
				 <td width="205" height="82" align="left" valign="middle">
					 <br>STATS:<br>
					 {$stats.total} - <b>Total Members</b> <br>
				 </td>
				 <td width="575" rowspan="3" align="center" valign="top">
					 <table width="570" height="312" border="0" cellpadding="0" cellspacing="0">
						 <tr>
							<form name="join" method="post" action="{$cfg.path.url_site}join.php">
							 <input type="hidden" name="reload_pic" value="1">
							 <td width="430" align="left" valign="top">
								 <table width="429" border="0" cellspacing="0" cellpadding="0" >
									 <tr>
										 <td style="padding-top:10px; padding-left:10px;" colspan="2">&nbsp;</td>
									 </tr>
									 <tr>
										 <td style="padding: 7px 5px 7px 10px;" colspan="2">Simply complete the simple form below and you will shortly receive <br>your password!</td>
									 </tr>
									 <tr>
										 <td style="padding: 5px 0px 5px 10px;" width="186"><b>Choose a Username</b></td>
										 <td width="243">
											 <input type="text" name="screen_name" value="{$data.screen_name}"	maxlength="12" class="join_input">
										 </td>
									 </tr>
									 <tr>
										 <td style="padding: 5px 0px 5px 10px;"><b>Your Email Address</b></td>
										 <td>
											 <input type="text" name="email" value="{$data.email}"	maxlength="50" class="join_input">
										 </td>
									 </tr>
									 <tr>
										 <td style="padding: 5px 0px 5px 10px;"><b>Confirm Email Address</b></td>
										 <td>
											 <input autocomplete="off" type="text" name="email2" value="{$data.email2}"	maxlength="50" class="join_input">
										 </td>
									 </tr>
									 <tr>
										 <td style="padding: 5px 0px 5px 10px;"><b>I am / We are a</b></td>
										 <td>
											 <input type="radio" name="sex" value="0" {if !$data.sex OR $data.sex == "0"} checked {/if}><label>{$cfg.profile.sex[0]}</label>
											 <input type="radio" name="sex" value="1" {if $data.sex == "1"} checked {/if}><label>{$cfg.profile.sex[1]}</label>
											 <input type="radio" name="sex" value="2" {if $data.sex == "2"} checked {/if}><label>{$cfg.profile.sex[2]}</label>
											 <input type="radio" name="sex" value="3" {if $data.sex == "3"} checked {/if}><label>{$cfg.profile.sex[3]}</label>
										 </td>
									 </tr>
									 <tr>
										 <td style="padding: 5px 0px 5px 10px;"><b>To meet with a</b></td>
										 <td>
											 <input type="checkbox" name="looking[0]" value="0" {if $data.looking[0]=="0" AND $data.looking[0] != ''} checked {/if}><label>{$cfg.profile.sex[0]}</label>
											 <input type="checkbox" name="looking[1]" value="1" {if $data.looking[1] == "1"} checked {/if}><label>{$cfg.profile.sex[1]}</label>
											 <input type="checkbox" name="looking[2]" value="2" {if $data.looking[2] == "2"} checked {/if}><label>{$cfg.profile.sex[2]}</label>
											 <input type="checkbox" name="looking[3]" value="3" {if $data.looking[3] == "3"} checked {/if}><label>{$cfg.profile.sex[3]}</label>
										 </td>
									 </tr>
									 <tr>
										 <td style="padding: 5px 0px 5px 10px;"><b>City/Town</b></td>
										 <td>
											 <input type="text" name="city" value="{$data.city}"	maxlength="25" class="join_input">
										 </td>
									 </tr>
									 <tr>
										 <td style="padding: 5px 0px 5px 10px;"><b>State</b></td>
										 <td>
											 <select name="state" class="join_input">
												 <option value="0">N/A Outsite USA</option>
												 {foreach from=$states key=id item=name}
													 <option value="{$id}" {if $data.state == $id}selected{/if}>{$name}</option>
												 {/foreach}
											 </select>
										 </td>
									 </tr>
									 <tr>
										 <td style="padding: 5px 0px 5px 10px;"><b>Country</b></td>
										 <td>
											 <select name="country" class="join_input">
												 {foreach from=$countries key=id item=name}
													 <option value="{$id}" {if $data.country == $id}selected{/if}>{$name}</option>
												 {/foreach}
											 </select>
										 </td>
									 </tr>
									 <tr>
										 <td width="47" align="left" valign="middle"><b>For:</b></td>
										 <td width="150" align="left" valign="top">
											 <input type="checkbox" name="for[0]"	value="0" {if $data.for[0] == 0 && $data.for[0] != ''}checked{/if}><label>{$cfg.profile.for[0]}</label>
										 </td>
										 <td width="150" align="left" valign="top">
											 <input type="checkbox" name="for[1]"	value="1" {if $data.for[1]}checked{/if}><label>{$cfg.profile.for[1]}</label>
										 </td>
									 </tr>
									 <tr>
										 <td align="left" valign="top">&nbsp;</td>
										 <td align="left" valign="top">
											 <input type="checkbox" name="for[2]"	value="2" {if $data.for[2]}checked{/if}><label>{$cfg.profile.for[2]}</label>
										 </td>
										 <td align="left" valign="top">
											 <input type="checkbox" name="for[3]"	value="3" {if $data.for[3]}checked{/if}><label>{$cfg.profile.for[3]}</label>
										 </td>
									 </tr>
									 <tr>
										 <td align="left" valign="top">&nbsp;</td>
										 <td align="left" valign="top">
											 <input type="checkbox" name="for[4]"	value="4" {if $data.for[4]}checked{/if}><label>{$cfg.profile.for[4]}</label>
										 </td>
										 <td align="left" valign="top">
											 <input type="checkbox" name="for[5]"	value="5" {if $data.for[5]}checked{/if}><label>{$cfg.profile.for[5]}</label>
										 </td>
									 </tr>
									 <tr>
										 <td align="left" valign="top">&nbsp;</td>
										 <td align="left" valign="top">&nbsp;</td>
										 <td align="left" valign="top">
											 <input type="checkbox" name="for[6]"	value="6" {if $data.for[6]}checked{/if}><label>{$cfg.profile.for[6]}</label>
										 </td>
									 </tr>
								 </table>
								 <table width="347" border="0" cellspacing="0" cellpadding="0" style="padding: 5px 0px 5px 0px;" class="join_text">
									 <tr>
										 <td><b>Birthdate</b></td>
										 <td>
											 <select name="month" class="join_form" style="width: 100px;">
												 <option value="">Month</option>
												 <optgroup>
													 {html_options values=$months options=$months selected=$data.month}
												 </optgroup>
											 </select>
											 &nbsp;
											 <select name="day" class="join_form" style="width: 65px;">
												 <option value="">Day</option>
												 <optgroup>
													 {html_options values=$days output=$days selected=$data.day}
												 </optgroup>
											 </select>
											 &nbsp;
											 <select name="year" class="join_form" style="width: 80px;">
												 <option value="">Year</option>
												 <optgroup>
													 {html_options values=$years output=$years selected=$data.year}
												 </optgroup>
											 </select>
										 </td>
									 </tr>
								 </table>
								 <table width="347" border="0" cellspacing="0" cellpadding="0" style="padding: 5px 0px 5px 0px;" class="join_text">
									 <tr>
										 <td width="182"><b>Optional Promotional Code</b></td>
										 <td width="165">
											 <input type="text" name="promcode" class="join_form" maxlength="15" style="width: 135px;" value="{$data.promcode}">
										 </td>
									 </tr>
								 </table>
								 <table width="347" border="0" cellspacing="0" cellpadding="0" style="padding: 5px 0px 5px 0px;" class="join_text">
									 <tr>
										 <td width="182"><b>Enter the code you see below:</b></td>
										 <td width="165">
											 <input autocomplete="off" type="text" name="random" class="join_form"	maxlength="6" style="width: 135px;">
										 </td>
									 </tr>
									 <tr>
										 <td colspan="2" align="center"><img src="{$cfg.path.url_site}verify.php" alt="" border="1"><br/> Cant read? <span onclick="document.join.submit();" style="cursor: hand;"><u>Refresh</u></span></td>
									 </tr>
								 </table>
								 <table width="347" border="0" cellspacing="0" cellpadding="0" style="padding: 5px 0px 5px 0px;" class="join_text">
									 <tr>
										 <td>
											 <input type="checkbox" name="terms" value="1" class="join_form"><b><label>I agree to the <a class="join_text" href="{$cfg.path.url_site}terms.php" onclick="window.open(this.href, 'terms', 'toolbar=no,location=no,directories=no,status=yes,menubar=no,resizable=yes,copyhistory=no,scrollbars=yes,width=510,height=450'); return false;"><u>terms & conditions</u>.</a></label></b>
										 </td>
									 </tr>
									 <tr>
										 <td align="center"><input type="submit" name="submit" value="submit"></td>
									 </tr>
								 </table>
							 </td>
						</form>
					</tr>
				</table>
			</td>
			 </tr>
				 <tr>
					 <td height="82" align="left" valign="middle">{$featured}</td>
				 </tr>
				 <tr>
 			 <form method="post" action="{$cfg.path.url_site}login.php">
					 <td height="82" align="left" valign="middle" class="stats"><table width="204" height="169" border="0" cellpadding="0" cellspacing="0">
						 <tr>
							 <td align="left" width="140" height="15" class="general_text">USER</td>
						 </tr>
						 <tr>
							 <td align="left" width="140" height="20"><input type="text" name="screenname" value="{$screen_name}" class="general_input" maxlength="12"></td>
						 </tr>
						 <tr>
							 <td align="left" width="140" height="15" class="general_text">PASSWORD</td>
						 </tr>
						 <tr>
							 <td align="left" width="140" height="20"><input type="password" name="pass" class="general_input" maxlength="12"></td>
						 </tr>
						 <tr>
							 <td align="right" valign="top" width="140" height="64">
								 <INPUT type="submit" name="submit" value="Login">
								 <br>
								 <span style="padding-right: 11px;"><a href="{$cfg.path.url_site}password.php" class="home_links">Forgot password?</a></span> </td>
						 </tr>
					 </table>
		 	</td>
		 	</form>
		</tr>
		</table>
	</td>
</tr>
</table>