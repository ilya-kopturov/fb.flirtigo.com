     <form method="post" action="mem_editprofiledetails.php">
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
                   <td width="568"  align="center">
                     <table width="560" border="0" cellpadding="0" cellspacing="0">
                       <tr style="padding: 5px 5px 5px 5px;">
                         <td colspan="2" width="280" align="left" valign="bottom">
                         </td>
                         <td colspan="2" width="280" align="right" valign="top" class="details_text"><a href="{$cfg.path.url_site}mem_myprofile.php" class="details_text"><u>Profile Summary</u></a> | <a href="{$cfg.path.url_site}mem_editprofile.php" class="details_text"><u>Your Introduction</u></a> | Your Details</td>
                       </tr>

                       <tr style="padding: 5px 5px 10px 10px;">
                         <td width="560" align="left" valign="bottom" colspan="4" class="search_text">
                           <b>Your Current Details</b>
                         </td>
                       </tr>                       
                       <tr style="padding: 5px 5px 5px 10px;">
                         <td width="280" align="left" valign="bottom" colspan="2" class="search_text">
                           You
                         </td>
                         <td width="280" align="left" valign="bottom" colspan="2" class="search_text">
                           {if $user.sex > 1}
                             Partner (Couples Only)
                           {/if}
                         </td>
                       </tr>
                       <tr style="padding: 3px 5px 3px 10px;">
                         <td width="80" align="left" valign="middle" class="search_text">
                           Age:
                         </td>
                         <td width="200" align="left" valign="middle" class="search_text">
					       <select name="month" class="search_input">{html_options values=$cfg.profile.months options=$cfg.profile.months selected=$age_array[1]}</select>
						   <select   name="day" class="search_input">{html_options values=$cfg.profile.days   output=$cfg.profile.days    selected=$age_array[2]}</select>
						   <select  name="year" class="search_input">{html_options values=$cfg.profile.years  output=$cfg.profile.years   selected=$age_array[0]}</select>
                         </td>
                         <td width="280" align="left" valign="middle" class="search_text" colspan="2">
                           {if $user.sex > 1}
					       <select name="p_month" class="search_input">{html_options values=$cfg.profile.months options=$cfg.profile.months selected=$p_age_array[1]}</select>
						   <select   name="p_day" class="search_input">{html_options values=$cfg.profile.days   output=$cfg.profile.days    selected=$p_age_array[2]}</select>
						   <select  name="p_year" class="search_input">{html_options values=$cfg.profile.years  output=$cfg.profile.years   selected=$p_age_array[0]}</select>
                           {/if}
                         </td>
                       </tr>
                       <tr style="padding: 3px 5px 3px 10px;">
                         <td width="80" align="left" valign="middle" class="search_text">
                           Height:
                         </td>
                         <td width="200" align="left" valign="middle" class="search_text">
                           <select name="height" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.height|replace:'Ask Me':'- any -' selected=$user.height}</select>
                         </td>
                         <td width="280" align="left" valign="middle" class="search_text" colspan="2">
                           {if $user.sex > 1}
                             <select name="p_height" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.height|replace:'Ask Me':'- any -' selected=$user.p_height}</select>
                           {/if}
                         </td>
                       </tr>
                       <tr style="padding: 3px 5px 3px 10px;">
                         <td width="80" align="left" valign="middle" class="search_text">
                           Weight:
                         </td>
                         <td width="200" align="left" valign="middle" class="search_text">
                           <select name="weight" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.weight|replace:'Ask Me':'- any -' selected=$user.weight}</select>
                         </td>
                         <td width="280" align="left" valign="middle" class="search_text" colspan="2">
                           {if $user.sex > 1}
                             <select name="p_weight" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.weight|replace:'Ask Me':'- any -' selected=$user.p_weight}</select>
                           {/if}
                         </td>
                       </tr>
                       <tr style="padding: 3px 5px 3px 10px;">
                         <td width="80" align="left" valign="middle" class="search_text">
                           Body shape:
                         </td>
                         <td width="200" align="left" valign="middle" class="search_text">
                           <select name="bodytype" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.bodytype|replace:'Ask Me':'- any -' selected=$user.bodytype}</select>
                         </td>
                         <td width="280" align="left" valign="middle" class="search_text" colspan="2">
                           {if $user.sex > 1}
                             <select name="p_bodytype" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.bodytype|replace:'Ask Me':'- any -' selected=$user.p_bodytype}</select>
                           {/if}
                         </td>
                       </tr>
                       <tr style="padding: 3px 5px 3px 10px;">
                         <td width="80" align="left" valign="middle" class="search_text">
                           Hair color:
                         </td>
                         <td width="200" align="left" valign="middle" class="search_text">
                           <select name="haircolor" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.haircolor|replace:'Ask Me':'- any -' selected=$user.haircolor}</select>
                         </td>
                         <td width="280" align="left" valign="middle" class="search_text" colspan="2">
                           {if $user.sex > 1}
                             <select name="p_haircolor" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.haircolor|replace:'Ask Me':'- any -' selected=$user.p_haircolor}</select>
                           {/if}
                         </td>
                       </tr>
                       <tr style="padding: 3px 5px 3px 10px;">
                         <td width="80" align="left" valign="middle" class="search_text">
                           Eye color:
                         </td>
                         <td width="200" align="left" valign="middle" class="search_text">
                           <select name="eyecolor" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.eyecolor|replace:'Ask Me':'- any -' selected=$user.eyecolor}</select>
                         </td>
                         <td width="280" align="left" valign="middle" class="search_text" colspan="2">
                           {if $user.sex > 1}
                             <select name="p_eyecolor" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.eyecolor|replace:'Ask Me':'- any -' selected=$user.p_eyecolor}</select>
                           {/if}
                         </td>
                       </tr>
                       <tr style="padding: 3px 5px 3px 10px;">
                         <td width="80" align="left" valign="middle" class="search_text">
                           Smoker:
                         </td>
                         <td width="200" align="left" valign="middle" class="search_text">
                           <select name="smoking" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.smoking|replace:'Ask Me':'- any -' selected=$user.smoking}</select>
                         </td>
                         <td width="280" align="left" valign="middle" class="search_text" colspan="2">
                           {if $user.sex > 1}
                             <select name="p_smoking" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.smoking|replace:'Ask Me':'- any -' selected=$user.p_smoking}</select>
                           {/if}
                         </td>
                       </tr>
                       <tr style="padding: 3px 5px 3px 10px;">
                         <td width="80" align="left" valign="middle" class="search_text">
                           Drink:
                         </td>
                         <td width="200" align="left" valign="middle" class="search_text">
                           <select name="drinking" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.drinking|replace:'Ask Me':'- any -' selected=$user.drinking}</select>
                         </td>
                         <td width="280" align="left" valign="middle" class="search_text" colspan="2">
                           {if $user.sex > 1}
                             <select name="p_drinking" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.drinking|replace:'Ask Me':'- any -' selected=$user.p_drinking}</select>
                           {/if}
                         </td>
                       </tr>
                       <tr style="padding: 3px 5px 3px 10px;">
                         <td width="80" align="left" valign="middle" class="search_text">
                           Ethnicity:
                         </td>
                         <td width="200" align="left" valign="middle" class="search_text">
                           <select name="ethnicity" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.ethnicity|replace:'Ask Me':'- any -' selected=$user.ethnicity}</select>
                         </td>
                         <td width="280" align="left" valign="middle" class="search_text" colspan="2">
                           {if $user.sex > 1}
                             <select name="p_ethnicity" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.ethnicity|replace:'Ask Me':'- any -' selected=$user.p_ethnicity}</select>
                           {/if}
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