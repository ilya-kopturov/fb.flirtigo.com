 <form method="post" action="mem_editprofile.php">
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
									 <tr>
										 <td width="90"></td>
										 <td width="190"></td>
										 <td width="90"></td>
										 <td width="190"></td>
									 </tr>
									 <tr style="padding: 5px 5px 5px 5px;">
										 <td colspan="2" width="275" align="left" valign="bottom">
										 </td>
										 <td colspan="2" width="275" align="right" valign="top" class="details_text"><a href="{$cfg.path.url_site}mem_myprofile.php" class="details_text"><u>Profile Summary</u></a> | Your Introduction | <a href="{$cfg.path.url_site}mem_editprofiledetails.php" class="details_text"><u>Your Details</u></a></td>
									 </tr>
									 
									 <tr style="padding: 5px 5px 5px 10px;">
										 <td width="560" align="left" valign="bottom" colspan="4" class="search_text">
											 <b>Your Current Search Criteria</b>
										 </td>
									 </tr>
									 <tr style="padding: 5px 5px 5px 0px;">
										 <td style="padding-left: 10px;" width="90" align="left" valign="middle" class="search_text">
											 Looking For:
										 </td>
										 <td width="457" align="left" valign="middle" colspan="3" class="search_text">
											 {section name=looking loop=$cfg.profile.sex}
											 <input type="checkbox" name="looking[{$smarty.section.looking.index}]" value="{$smarty.section.looking.index}" class="search_input" {if $looking_array[$smarty.section.looking.index]}checked{/if}><label>{$cfg.profile.sex[looking]}</label>
											 {/section}
										 </td>
									 </tr>
									 <tr>
										 <td colspan="4" width="560" class="search_text">
										 <table border="0" cellpadding="0" cellspacing="0">
										 <tr style="padding: 7px 5px 7px 12px;">
										 <td width="90" align="left" valign="top" class="search_text">
											 For:
										 </td>
										 <td width="160" align="left" valign="top" class="search_text">
											 <input type="checkbox" name="for[0]"	value="0" class="search_input" {if $forr_array[0]}checked{/if}><label>{$cfg.profile.for[0]}</label>
												 <br>
											 <input type="checkbox" name="for[3]"	value="3" class="search_input" {if $forr_array[3]}checked{/if}><label>{$cfg.profile.for[3]}</label>
										 </td>
										 <td width="160" align="left" valign="top" class="search_text">
											 <input type="checkbox" name="for[1]"	value="1" class="search_input" {if $forr_array[1]}checked{/if}><label>{$cfg.profile.for[1]}</label>
												 <br>
											 <input type="checkbox" name="for[4]"	value="4" class="search_input" {if $forr_array[4]}checked{/if}><label>{$cfg.profile.for[4]}</label>
										 </td>
										 <td width="150" align="left" valign="top" class="search_text">
											 <input type="checkbox" name="for[2]"	value="2" class="search_input" {if $forr_array[2]}checked{/if}><label>{$cfg.profile.for[2]}</label>
												 <br>
											 <input type="checkbox" name="for[5]"	value="5" class="search_input" {if $forr_array[5]}checked{/if}><label>{$cfg.profile.for[5]}</label>
												 <br>
											 <input type="checkbox" name="for[6]"	value="6" class="search_input" {if $forr_array[6]}checked{/if}><label>{$cfg.profile.for[6]}</label>
										 </td>
										 </tr>
										 </table>
									 </tr>
									 <tr>
										 <td colspan="4" width="560" class="search_text">
										 <table border="0" cellpadding="0" cellspacing="0">
										 <tr style="padding: 5px 5px 7px 10px;">
										 <td width="90" align="left" valign="top" class="search_text">
											 Fetishes:
										 </td>
										 <td width="160" align="left" valign="top" class="search_text">
											 <input type="checkbox" name="sexualactivities[0]"	value="0" class="search_input" {if $sexualactivities_array[0]}checked{/if}><label>{$cfg.profile.sexualactivities[0]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[3]"	value="3" class="search_input" {if $sexualactivities_array[3]}checked{/if}><label>{$cfg.profile.sexualactivities[3]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[6]"	value="6" class="search_input" {if $sexualactivities_array[6]}checked{/if}><label>{$cfg.profile.sexualactivities[6]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[9]"	value="9" class="search_input" {if $sexualactivities_array[9]}checked{/if}><label>{$cfg.profile.sexualactivities[9]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[12]"	value="12" class="search_input" {if $sexualactivities_array[12]}checked{/if}><label>{$cfg.profile.sexualactivities[12]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[15]"	value="15" class="search_input" {if $sexualactivities_array[15]}checked{/if}><label>{$cfg.profile.sexualactivities[15]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[18]"	value="18" class="search_input" {if $sexualactivities_array[18]}checked{/if}><label>{$cfg.profile.sexualactivities[18]}</label>
										 </td>
										 <td width="160" align="left" valign="top" class="search_text">
											 <input type="checkbox" name="sexualactivities[1]"	value="1" class="search_input" {if $sexualactivities_array[1]}checked{/if}><label>{$cfg.profile.sexualactivities[1]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[4]"	value="4" class="search_input" {if $sexualactivities_array[4]}checked{/if}><label>{$cfg.profile.sexualactivities[4]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[7]"	value="7" class="search_input" {if $sexualactivities_array[7]}checked{/if}><label>{$cfg.profile.sexualactivities[7]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[10]"	value="10" class="search_input" {if $sexualactivities_array[10]}checked{/if}><label>{$cfg.profile.sexualactivities[10]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[13]"	value="13" class="search_input" {if $sexualactivities_array[13]}checked{/if}><label>{$cfg.profile.sexualactivities[13]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[16]"	value="16" class="search_input" {if $sexualactivities_array[16]}checked{/if}><label>{$cfg.profile.sexualactivities[16]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[19]"	value="19" class="search_input" {if $sexualactivities_array[19]}checked{/if}><label>{$cfg.profile.sexualactivities[19]}</label>
										 </td>
										 <td width="150" align="left" valign="top" class="search_text">
											 <input type="checkbox" name="sexualactivities[2]"	value="2" class="search_input" {if $sexualactivities_array[2]}checked{/if}><label>{$cfg.profile.sexualactivities[2]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[5]"	value="5" class="search_input" {if $sexualactivities_array[5]}checked{/if}><label>{$cfg.profile.sexualactivities[5]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[8]"	value="8" class="search_input" {if $sexualactivities_array[8]}checked{/if}><label>{$cfg.profile.sexualactivities[8]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[11]"	value="11" class="search_input" {if $sexualactivities_array[11]}checked{/if}><label>{$cfg.profile.sexualactivities[11]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[14]"	value="14" class="search_input" {if $sexualactivities_array[14]}checked{/if}><label>{$cfg.profile.sexualactivities[14]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[17]"	value="17" class="search_input" {if $sexualactivities_array[17]}checked{/if}><label>{$cfg.profile.sexualactivities[17]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[20]"	value="20" class="search_input" {if $sexualactivities_array[20]}checked{/if}><label>{$cfg.profile.sexualactivities[20]}</label>
												 <br>
											 <input type="checkbox" name="sexualactivities[21]"	value="21" class="search_input" {if $sexualactivities_array[21]}checked{/if}><label>{$cfg.profile.sexualactivities[21]}</label>
										 </td>
										 </tr>
										 </table>
									 </tr>
									 <tr style="padding: 0px 5px 5px 10px;">
										 <td width="560" align="left" valign="bottom" colspan="4" class="search_text">
											 <b>Your Introduction</b>
										 </td>
									 </tr>
									 <tr style="padding: 5px 5px 0px 10px;">
										 <td width="560" align="left" valign="bottom" colspan="4" class="search_text">
											 Profile title (shown in searches etc.)
										 </td>
									 </tr>
									 <tr style="padding: 2px 5px 3px 10px;">
										 <td width="90"></td>
										 <td width="470" align="left" valign="bottom" colspan="3" class="search_text">
											 <input class="search_input" type="text" name="introtitle" value="{if $editprofile_values.introtitle}{$editprofile_values.introtitle}{else}{$user.introtitle}{/if}" maxlenght="150" style="width: 350px;">
										 </td>
									 </tr>
									 <tr style="padding: 5px 5px 0px 10px;">
										 <td width="560" align="left" valign="bottom" colspan="4" class="search_text">
											 Tell other members about yourself (and your partner if applicable)
										 </td>
									 </tr>
									 <tr style="padding: 2px 5px 3px 10px;">
										 <td width="90"></td>
										 <td width="470" align="left" valign="bottom" colspan="3" class="search_text">
											 <textarea class="search_input" name="introtext" style="width: 350px; height: 85px;">{if $editprofile_values.introtext}{$editprofile_values.introtext}{else}{$user.introtext}{/if}</textarea>
										 </td>
									 </tr>
									 <tr style="padding: 5px 5px 0px 10px;">
										 <td width="560" align="left" valign="bottom" colspan="4" class="search_text">
											 Describe what you are looking for
										 </td>
									 </tr>
									 <tr style="padding: 2px 5px 3px 10px;">
										 <td width="90"></td>
										 <td width="470" align="left" valign="bottom" colspan="3" class="search_text">
											 <textarea class="search_input" name="describe" style="width: 350px; height: 85px;">{if $editprofile_values.describe}{$editprofile_values.describe}{else}{$user.describe}{/if}</textarea>
										 </td>
									 </tr>																							
									 <tr style="padding: 15px 5px 13px 5px;">
										 <td align="center" colspan="4"><input name="submit" type="submit" value="Edit"></td>
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