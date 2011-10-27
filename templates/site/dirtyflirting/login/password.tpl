     <form method="post" action="mem_password.php">
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
                   <td width="568"  align="center" >
                     <table width="560" border="0" cellpadding="0" cellspacing="0">
                       <tr style="padding: 5px 5px 5px 5px;">
                         <td width="280" align="left" valign="bottom">
                         </td>
                         <td width="280" align="right" valign="top" class="details_text">Change My Password <!-- | <a href="{$cfg.path.url_site}mem_email.php" class="details_text"><u>Change My Email Address</u></a> --> </td>
                       </tr>
                       
                       <tr style="padding: 5px 5px 5px 10px;">
                         <td width="270" align="right" valign="middle" class="search_text">
                           Current Password:
                         </td>
                         <td width="280" align="left" valign="middle">
                           <input type="password" name="current_password" class="search_input" maxlength="12">
                         </td>
                       </tr>
                       <tr style="padding: 5px 5px 5px 10px;">
                         <td width="270" align="right" valign="middle" class="search_text">
                           New Password:
                         </td>
                         <td width="280" align="left" valign="middle">
                           <input type="password" name="new_password" class="search_input" maxlength="12">
                         </td>
                       </tr>
                       <tr style="padding: 5px 5px 5px 10px;">
                         <td width="270" align="right" valign="middle" class="search_text">
                           Retype New Password:
                         </td>
                         <td width="280" align="left" valign="middle">
                           <input type="password" name="retype_password" class="search_input" maxlength="12">
                         </td>
                       </tr>
                       
                       <tr style="padding: 15px 5px 13px 5px;">
                         <td align="center" colspan="2"><input name="submit_x" type="submit" value="Change Password"></td>
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