{include file="site/dirtyflirting/login/menu.tpl"}

<table class="search_container">
	<tr>
		<td>
		{* MEMBER PAGE - RIGHT - *}

		{if $smarty.get.msg}
			 <table class="error">
				 <tr>
					 <td class="h_error">
						 <div class="errorTextSmall" align="center">{$smarty.get.msg}</div>
					 </td>
				 </tr>
			 </table>
		{/if}
		 <form name="detailedsearch" method="get" action="mem_searchresults.php" onsubmit="javascript: if( checkcity('detailedsearch') )return true; else return false;">
		 <input type="hidden" name="searchtype" value="detailed">
			 <table style="width: 760; border: 0px;" cellpadding="0" cellspacing="0">
				 <tr>
					 <td>
						 <table class="tabs_header" cellpadding="0" cellspacing="0">
							 <tr style="padding:10px 0px;">
								 <td colspan="4" class="redtitle" style="text-align: left;">Detailed Search </td>
							 </tr>
							 <tr style="padding-bottom: 10px;">
								 <td class="featuredPopular1">
									 <a href="{$cfg.path.url_site}mem_searchbasic.php"><img src="{$cfg.template.url_template}login/images/dirtyflirting_basic_inactive.gif" onmouseover="menu_mouseout('search_basic','{$cfg.template.url_template}login/images/dirtyflirting_basic_on.gif');" onmouseout="menu_mouseout('search_basic','{$cfg.template.url_template}login/images/dirtyflirting_basic_inactive.gif');" id="search_basic" style="border: 0px;" /></a>
								 </td>
								 <td class="featuredPopular2">
									 <img src="{$cfg.template.url_template}login/images/dirtyflirting_graypixel.gif" class="featuredPopular2" />
								 </td>
								 <td style="height: 23px; width: 80px;">
									 <img src="{$cfg.template.url_template}login/images/dirtyflirting_detailed_active.gif" style="border: 0px;" />
								 </td>
								 <td style="height: 1px; width: 612px; vertical-align: bottom;">
									 <img src="{$cfg.template.url_template}login/images/dirtyflirting_graypixel.gif" style="width: 612px; height: 1px;" />
								 </td>
							 </tr>
						 </table>
					 </td>
				 </tr>
				 <tr>
				 <tr>
					 <td align="center"	>
						 <table class="memberstable normaltext" style="width: 760;" cellpadding="0" cellspacing="0">
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" align="left" valign="middle">
									 Screen Name:
								 </td>
								 <td width="240" colspan="2">
									<input type="text" name="screenname" class="search_input">
								 </td>
							 </tr>
							<tr><td>&nbsp;</td></tr>
							 <tr style="padding: 25px 5px 5px 10px;">
								 <td width="140" >
									 I am / We are a:
								 </td>
								 <td width="240" align="left" valign="middle">
									 <select name="looking" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.sex selected="0"}</option>
								 </td>
								 <td width="140" >
									 Looking for:
								 </td>
								 <td width="240" align="left" valign="middle">
									 <select name="sex" class="search_input" style="width: 150px;" onchange="javascript: searchcouple('detailedsearch',this.value);">{html_options options=$cfg.profile.looking selected="1"}</option>
								 </td>
							 </tr>
							 <tr>
								 <td colspan="4" width="760" >
								 <table border="0" cellpadding="0" cellspacing="0">
								 <tr style="padding: 7px 5px 7px 10px;">
								 <td width="140" align="left" valign="top" >
									 For:
								 </td>
								 <td width="210" align="left" valign="top" >
									 <input type="checkbox" name="for[0]"	value="0" class="search_input"><label>{$cfg.profile.for[0]}</label>
										 <br>
									 <input type="checkbox" name="for[3]"	value="3" class="search_input"><label>{$cfg.profile.for[3]}</label>
								 </td>
								 <td width="210" align="left" valign="top" >
									 <input type="checkbox" name="for[1]"	value="1" class="search_input"><label>{$cfg.profile.for[1]}</label>
										 <br>
									 <input type="checkbox" name="for[4]"	value="4" class="search_input"><label>{$cfg.profile.for[4]}</label>
								 </td>
								 <td width="200" align="left" valign="top" >
									 <input type="checkbox" name="for[2]"	value="2" class="search_input"><label>{$cfg.profile.for[2]}</label>
										 <br>
									 <input type="checkbox" name="for[5]"	value="5" class="search_input"><label>{$cfg.profile.for[5]}</label>
										 <br>
									 <input type="checkbox" name="for[6]"	value="6" class="search_input"><label>{$cfg.profile.for[6]}</label>
								 </td>
								 </tr>
								 </table>
							 </tr>
							 <tr>
								 <td colspan="4" width="760" >
								 <table border="0" cellpadding="0" cellspacing="0">
								 <tr style="padding: 5px 5px 7px 10px;">
								 <td width="140" align="left" valign="top" >
									 Fetishes:
								 </td>
								 <td width="210" align="left" valign="top" >
									 <input type="checkbox" name="sexualactivities[0]"	value="0" class="search_input"><label>{$cfg.profile.sexualactivities[0]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[3]"	value="3" class="search_input"><label>{$cfg.profile.sexualactivities[3]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[6]"	value="6" class="search_input"><label>{$cfg.profile.sexualactivities[6]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[9]"	value="9" class="search_input"><label>{$cfg.profile.sexualactivities[9]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[12]"	value="12" class="search_input"><label>{$cfg.profile.sexualactivities[12]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[15]"	value="15" class="search_input"><label>{$cfg.profile.sexualactivities[15]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[18]"	value="18" class="search_input"><label>{$cfg.profile.sexualactivities[18]}</label>
								 </td>
								 <td width="210" align="left" valign="top" >
									 <input type="checkbox" name="sexualactivities[1]"	value="1" class="search_input"><label>{$cfg.profile.sexualactivities[1]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[4]"	value="4" class="search_input"><label>{$cfg.profile.sexualactivities[4]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[7]"	value="7" class="search_input"><label>{$cfg.profile.sexualactivities[7]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[10]"	value="10" class="search_input"><label>{$cfg.profile.sexualactivities[10]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[13]"	value="13" class="search_input"><label>{$cfg.profile.sexualactivities[13]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[16]"	value="16" class="search_input"><label>{$cfg.profile.sexualactivities[16]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[19]"	value="19" class="search_input"><label>{$cfg.profile.sexualactivities[19]}</label>
								 </td>
								 <td width="200" align="left" valign="top" >
									 <input type="checkbox" name="sexualactivities[2]"	value="2" class="search_input"><label>{$cfg.profile.sexualactivities[2]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[5]"	value="5" class="search_input"><label>{$cfg.profile.sexualactivities[5]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[8]"	value="8" class="search_input"><label>{$cfg.profile.sexualactivities[8]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[11]"	value="11" class="search_input"><label>{$cfg.profile.sexualactivities[11]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[14]"	value="14" class="search_input"><label>{$cfg.profile.sexualactivities[14]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[17]"	value="17" class="search_input"><label>{$cfg.profile.sexualactivities[17]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[20]"	value="20" class="search_input"><label>{$cfg.profile.sexualactivities[20]}</label>
										 <br>
									 <input type="checkbox" name="sexualactivities[21]"	value="21" class="search_input"><label>{$cfg.profile.sexualactivities[21]}</label>
								 </td>
								 </tr>
								 </table>
							 </tr>
							 <tr style="padding: 5px 5px 5px 10px;">
								 <td width="380" align="left" valign="bottom" colspan="2" >
									 Members details
								 </td>
								 <td width="380" align="left" valign="bottom" colspan="2" >
									 Partner (Couples Only)
								 </td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 Age:
								 </td>
								 <td width="240" >
									 <select name="age_from" class="search_input">{html_options values=$cfg.profile.age output=$cfg.profile.age selected="18"}</select> - <select name="age_to" class="search_input">{html_options values=$cfg.profile.age output=$cfg.profile.age selected="99"}</select>
								 </td>
								 <td width="380" align="left" valign="middle"	colspan="2">
									 <select disabled name="p_age_from" class="search_input">{html_options values=$cfg.profile.age output=$cfg.profile.age selected="18"}</select> - <select disabled name="p_age_to" class="search_input">{html_options values=$cfg.profile.age output=$cfg.profile.age selected="99"}</select>
								 </td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 Height:
								 </td>
								 <td width="240" >
									 <select name="height" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.height|replace:'Ask Me':'- any -'}</select>
								 </td>
								 <td width="380" align="left" valign="middle"	colspan="2">
									 <select disabled name="p_height" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.height|replace:'Ask Me':'- any -'}</select>
								 </td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 Weight:
								 </td>
								 <td width="240" >
									 <select name="weight" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.weight|replace:'Ask Me':'- any -'}</select>
								 </td>
								 <td width="380" align="left" valign="middle"	colspan="2">
									 <select disabled name="p_weight" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.weight|replace:'Ask Me':'- any -'}</select>
								 </td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 Body shape:
								 </td>
								 <td width="240" >
									 <select name="bodytype" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.bodytype|replace:'Ask Me':'- any -'}</select>
								 </td>
								 <td width="380" align="left" valign="middle"	colspan="2">
									 <select disabled name="p_bodytype" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.bodytype|replace:'Ask Me':'- any -'}</select>
								 </td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 Hair color:
								 </td>
								 <td width="240" >
									 <select name="haircolor" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.haircolor|replace:'Ask Me':'- any -'}</select>
								 </td>
								 <td width="380" align="left" valign="middle"	colspan="2">
									 <select disabled name="p_haircolor" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.haircolor|replace:'Ask Me':'- any -'}</select>
								 </td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 Eye color:
								 </td>
								 <td width="240" >
									 <select name="eyecolor" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.eyecolor|replace:'Ask Me':'- any -'}</select>
								 </td>
								 <td width="380" align="left" valign="middle"	colspan="2">
									 <select disabled name="p_eyecolor" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.eyecolor|replace:'Ask Me':'- any -'}</select>
								 </td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 Smoker:
								 </td>
								 <td width="240" >
									 <select name="smoking" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.smoking|replace:'Ask Me':'- any -'}</select>
								 </td>
								 <td width="380" align="left" valign="middle"	colspan="2">
									 <select disabled name="p_smoking" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.smoking|replace:'Ask Me':'- any -'}</select>
								 </td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 Drink:
								 </td>
								 <td width="240" >
									 <select name="drinking" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.drinking|replace:'Ask Me':'- any -'}</select>
								 </td>
								 <td width="380" align="left" valign="middle"	colspan="2">
									 <select disabled name="p_drinking" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.drinking|replace:'Ask Me':'- any -'}</select>
								 </td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 Ethnicity:
								 </td>
								 <td width="240" >
									 <select name="ethnicity" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.ethnicity|replace:'Ask Me':'- any -'}</select>
								 </td>
								 <td width="380" align="left" valign="middle"	colspan="2">
									 <select disabled name="p_ethnicity" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.ethnicity|replace:'Ask Me':'- any -'}</select>
								 </td>
							 </tr>

							 <tr style="padding: 5px 5px 3px 10px;">
								 <td width="140" >
									 City:
								 </td>
								 <td width="240" >
									 <input type="text" name="city" class="search_input" style="width: 145px;" value="{if $search_date.city}{$search_date.city}{else}{$smarty.session.sess_city}{/if}">
								 </td>
								 <td width="380" align="left" valign="middle" colspan="2"></td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 State/Town:
								 </td>
								 <td width="240" >
									 <select name="state" class="search_input" style="width: 150px;">
										 <option value="0">- any -</option>
										 {foreach from=$states key=id item=name}
											 <option value="{$id}" {if $search_data.state == $id}selected{elseif $smarty.session.sess_state == $id}selected{/if}>{$name}</option>
										 {/foreach}
									 </select>
								 </td>
								 <td width="380" align="left" valign="middle" colspan="2">
									 {*<input type="checkbox" name="withpicture" value="1" {if $search_data.withpicture == 1}checked{/if} class="search_input"><label>only show members with photos</label>*}
								 </td>
							 </tr>
							 <tr style="padding: 3px 5px 3px 10px;">
								 <td width="140" >
									 Country:
								 </td>
								 <td width="240" >
									 <select name="country" class="search_input" style="width: 150px;">
										 {foreach from=$countries key=id item=name}
											 <option value="{$id}" {if $search_data.country == $id}selected{elseif $smarty.session.sess_country == $id}selected{/if}>{$name}</option>
										 {/foreach}
									 </select>
								 </td>
								 <td width="380" align="left" valign="middle"	colspan="2">
									 <input type="checkbox" name="withpicture"	value="1" {if $search_data.withpicture == 1}checked{/if} class="search_input"><label>only show members with photos or videos</label>
								 </td>
							 </tr>
							 <tr style="padding: 15px 5px 13px 5px;">
								 <td align="center" colspan="4">
									 <input type="image" src="{$cfg.template.url_template}login/images/dirtyflirting_button_search.gif" name="submit" />
								 </td>
							 </tr>
						 </table>
					 </td>
				 </tr>
				 <tr>
					 <td height="3" width="568"></td>
				 </tr>
			 </table>
		 </form>
		</td>
	</tr>
</table>