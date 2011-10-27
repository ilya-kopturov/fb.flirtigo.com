     <form method="post" action="mem_email.php">
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
                   <td height="3" width="568" background="{$cfg.template.url_template}login/images/circle_top.gif"></td>
                 </tr>
                 <tr>
                   <td width="568"  align="center">
                     <table width="560" border="0" cellpadding="0" cellspacing="0">
                       <tr style="padding: 5px 5px 5px 5px;">
                         <td width="280" align="left" valign="bottom">
                           <img src="{$cfg.template.url_template}login/images/myoptionsemail.gif" border="0">
                         </td>
                         <td width="280" align="right" valign="top" class="details_text"><a href="{$cfg.path.url_site}mem_password.php" class="details_text"><u>Change My Password</u></a> | Change My Email Address</td>
                       </tr>
                       
                       <tr style="padding: 5px 5px 5px 10px;">
                         <td width="270" align="right" valign="middle" class="search_text">
                           Current Email:
                         </td>
                         <td width="280" align="left" valign="middle">
                           <input type="text" name="current_email" class="search_input">
                         </td>
                       </tr>
                       <tr style="padding: 5px 5px 5px 10px;">
                         <td width="270" align="right" valign="middle" class="search_text">
                           New Email:
                         </td>
                         <td width="280" align="left" valign="middle">
                           <input type="text" name="new_email" class="search_input">
                         </td>
                       </tr>
                       <tr style="padding: 5px 5px 5px 10px;">
                         <td width="270" align="right" valign="middle" class="search_text">
                           Re-enter Your New Email:
                         </td>
                         <td width="280" align="left" valign="middle">
                           <input autocomplete="off" type="text" name="retype_email" class="search_input">
                         </td>
                       </tr>
                       
                       <tr style="padding: 15px 5px 13px 5px;">
                         <td align="center" colspan="2"><input name="submit" type="image" src="{$cfg.template.url_template}login/images/adjustsubmit.gif"></td>
                       </tr>
                     </table>
                   </td>
                 </tr>
                 <tr>
                   <td height="3" width="568" background="{$cfg.template.url_template}login/images/circle_bottom.gif"></td>
                 </tr>
               </table>
                              
             </td>
           </tr>
         </table>
       </td>
     </tr>
     </form>