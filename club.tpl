     <form name="basicsearch" method="get" action="mem_searchresults.php" onsubmit="javascript: if( checkcity('basicsearch') )return true; else return false;">
     <input type="hidden" name="searchtype" value="basic">
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
                     </table>
                   </td>
                 </tr>
                 <tr>
                   <td height="3" width="568"></td>
                 </tr>
               </table>

               <table><tr><td height="2"></td></tr></table>
             
               <table width="568" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                   <td height="3" width="568"></td>
                 </tr>
                 <tr>
                   <td width="568" align="center">
                     <table width="560" border="0" cellpadding="0" cellspacing="0" class="join_text">
                       <tr style="padding: 5px 5px 5px 5px;">
                         <td rowspan="3" align="center" valign="middle" style="padding: 5px 5px 5px 5px;">
                           <a href="javascript: window.open('{$cfg.path.url_site}mem_plugins.php?id={$most[0].id}','pluginwindow','width=1000,height=600,resizable=no,menubar=no,status=no,location=no,toolbar=no,scrollbars=no'); void(0);"><img src="{$cfg.path.url_site}images/mc_{$most[0].id}b.jpg" border="0"></a>
                         </td>
                         <td colspan="2" align="left" valign="bottom">
                         </td>
                       </tr>
                       <tr style="padding: 5px 5px 5px 5px;">
                         <td align="left" valign="bottom">
                           <a href="javascript: window.open('{$cfg.path.url_site}mem_plugins.php?id={$most[0].id}','pluginwindow','width=1000,height=600,resizable=no,menubar=no,status=no,location=no,toolbar=no,scrollbars=no'); void(0);" class="join_text"><u><b>{$most[0].title}</b></u></a> <br>
                           <b>Updated:</b> {if $most[0].updated == 1}Weekly{else}Monthly{/if}
                         </td>
                         <td align="left" valign="bottom">
                           <b>Rating:</b> {rating rating=$most[0].rating id=$plugins[0].id} <Br>
                           <B>{$most[0].votes}</B> votes (<B>{$most[0].rating|string_format:"%.2f"}</B>)
                         </td>
                       </tr>
                       <tr style="padding: 5px 5px 5px 5px;">
                         <td colspan="2" align="left" valign="bottom">
                           <b>Description:</b> {$most[0].description} <Br>
                           {adddelete user_id=$smarty.session.sess_id plugin_id=$most[0].id}
                         </td>
                       </tr>
                   
                     </table>
                   </td>
                 </tr>
                 <tr>
                   <td height="3" width="568" background="{$cfg.template.url_template}login/images/circle_bottom.gif"></td>
                 </tr>
               </table>

			   <table><tr><td height="2"></td></tr></table>

               <table width="568" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                   <td height="3" width="568" background="{$cfg.template.url_template}login/images/circle_top.gif"></td>
                 </tr>
                 <tr>
                   <td width="568" align="center">
                     <table width="540" border="0" cellpadding="0" cellspacing="0">
                       <tr style="padding: 5px 5px 5px 5px;">
                         <td width="270" align="left" valign="bottom">
                           <img src="{$cfg.template.url_template}login/images/membersclub_links.gif" border="0">
                         </td>
                         <td width="270" align="right" valign="top" class="details_text">
                           {if $view == 2}
                             <a href="{$cfg.path.url_site}mem_xtras.php?view=3" class="details_text"><u>View by Rating</u></a> | <a href="{$cfg.path.url_site}mem_xtras.php" class="details_text"><u>View by Viewed</u></a>
                           {elseif $view == 3}
                             <a href="{$cfg.path.url_site}mem_xtras.php?view=2" class="details_text"><u>My Favorite Sites</u></a> | <a href="{$cfg.path.url_site}mem_xtras.php" class="details_text"><u>View by Viewed</u></a>
                           {else}
                             <a href="{$cfg.path.url_site}mem_xtras.php?view=2" class="details_text"><u>My Favorite Sites</u></a> | <a href="{$cfg.path.url_site}mem_xtras.php?view=3" class="details_text"><u>View by Rating</u></a>
                           {/if}
                         </td>
                       </tr>
                       
                       <tr valign="top" style="padding: 5px 5px 5px 10px;">
                         <td colspan="2">
                           <table border="0" cellpadding="0" cellspacing="0">
                           <tr valign="top" style="padding: 5px 5px 5px 10px;">
                           {section name=membersclub loop=$plugins start=0 max=9}
                             <td align="left" width="165">
                               <table width="165" border="0" cellpadding="0" cellspacing="0">
                                 <tr>
                                   <td><a href="javascript: window.open('{$cfg.path.url_site}mem_plugins.php?id={$plugins[membersclub].id}','pluginwindow','width=1000,height=600,resizable=no,menubar=no,status=no,location=no,toolbar=no,scrollbars=no'); void(0);"><img src="{$cfg.path.url_site}images/mc_{$plugins[membersclub].id}s.jpg" border="0"></td>
                                 </tr>
                                 <tr>
                                   <td>
                                     {if $plugins[membersclub].new == 'Y'}<img src="{$cfg.template.url_template}login/images/membersclub_new.gif" border="0">{/if} <img src="{$cfg.template.url_template}login/images/arrow.gif" border="0"> <a href="javascript: window.open('{$cfg.path.url_site}mem_plugins.php?id={$plugins[membersclub].id}','pluginwindow','width=1000,height=600,resizable=no,menubar=no,status=no,location=no,toolbar=no,scrollbars=no'); void(0);" class="join_text"><u><b>{$plugins[membersclub].title}</b></u></a>
                                   </td>
                                 </tr>
                                 <tr style="padding-top: 5px;" class="join_text">
                                   <td><b>Updated:</b> {if $plugins[membersclub].updated == 1}Weekly{else}Monthly{/if}</td>
                                 </tr>
                                 <tr style="padding-top: 5px;" class="join_text">
                                   <td><b>Rating:</b> {rating rating=$plugins[membersclub].rating id=$plugins[membersclub].id}</td>
                                 </tr>
                                 <tr style="padding-top: 5px;" class="join_text">
                                   <td><B>{$plugins[membersclub].votes}</B> votes (<B>{$plugins[membersclub].rating|string_format:"%.2f"}</B>)</td>
                                 </tr>
                                 <tr style="padding-top: 5px; padding-bottom: 15px;" class="join_text">
                                   <td>{adddelete user_id=$smarty.session.sess_id plugin_id=$plugins[membersclub].id}</td>
                                 </tr>
                               </table>
                             </td>
                             {if $smarty.section.membersclub.iteration%3 == 0}
                               </tr>
                               <tr valign="top" style="padding: 5px 5px 5px 10px;">
                             {/if}
                           {sectionelse}
                             <td align="center" class="myprofile_text"> No results found.</td>
                           {/section}
                           </tr>
                           {if $plugins[9].id}
                             <tr align="left" style="padding: 5px 5px 5px 10px;" class="join_text">
                               <td colspan="3"><font color="red"><b>More Sites!</b> <img src="{$cfg.template.url_template}login/images/arrow.gif" border="0"> {section name=membersclub loop=$plugins start=9 max=3}<a href="javascript: window.open('{$cfg.path.url_site}mem_plugins.php?id={$plugins[membersclub].id}','pluginwindow','width=1000,height=600,resizable=no,menubar=no,status=no,location=no,toolbar=no,scrollbars=no'); void(0);" class="join_text"><u><b>{$plugins[membersclub].title}</b></u></a>{/section}</td>
                             </tr>
                           {/if}
                           </table>
                         </td>
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