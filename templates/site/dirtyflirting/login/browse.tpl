
  {include file="site/dirtyflirting/login/menu.tpl"}

  <table style="margin-left: auto; margin-right: auto; width: 744px;">
    <tr>
      <td>
      {* MEMBER PAGE - RIGHT - *}

			{if $smarty.get.msg}
			   <table class="error" style="width:568px">
			     <tr>
			       <td class="h_error">
			         <div class="errorTextSmall" align="center">{$smarty.get.msg}</div>
			       </td>
			     </tr>
			   </table>
			{/if}

               <table style="width: 744px;" cellpadding="0" cellspacing="0">
                 <tr>
                   <td class="redtitle" style="padding-bottom: 15px; text-align: left;">Browse</td>
                 </tr>
               </table>
               <table class="memberstable normaltext" style="width: 744px;" cellpadding="0" cellspacing="0">
                 <tr>
                   <td align="left" style="padding: 5px; font-weight: bold;">United States</td>
                 </tr>
                 {section name="us" loop=$usa_states}
                 <tr>
                   <td align="left" style="padding: 5px 5px 5px 20px;">
                     <a href="{$cfg.path.url_site}mem_searchresults.php?country=1&state={$smarty.section.us.index}&login.x=34&login.y=15">{$usa_states[us]}</a>
                   </td>
                 </tr>
                 {/section}
                 <tr>
                   <td align="left" style="padding: 5px;">
                     <a href="{$cfg.path.url_site}mem_searchresults.php?country=3&login.x=34&login.y=15">United Kingdom</a>
                   </td>
                 </tr>
                 <tr>
                   <td align="left" style="padding: 5px;">
                     <a href="{$cfg.path.url_site}mem_searchresults.php?country=2&login.x=34&login.y=15">Canada</a>
                   </td>
                 </tr>
                 <tr>
                   <td align="left" style="padding: 5px;">
                     <a href="{$cfg.path.url_site}mem_searchresults.php?country=15&login.x=34&login.y=15">Australia</a>
                   </td>
                 </tr>
                 <tr>
                   <td align="left" style="padding: 5px; font-weight: bold;">Europe</td>
                 </tr>
                 {section name="eu" loop=$eu_countries}
                 <tr>
                   <td align="left" style="padding: 5px 5px 5px 20px;">
                     <a href="{$cfg.path.url_site}mem_searchresults.php?country={$eu_countries[eu].id}&login.x=34&login.y=15">{$eu_countries[eu].country}</a>
                   </td>
                 </tr>
                 {/section}
                 <tr>
                   <td align="left" style="padding: 5px; font-weight: bold;">Rest of the World</td>
                 </tr>
                 {section name="row" loop=$row_countries}
                 <tr>
                   <td align="left" style="padding: 5px 5px 5px 20px;">
                     <a href="{$cfg.path.url_site}mem_searchresults.php?country={$row_countries[row].id}&login.x=34&login.y=15">{$row_countries[row].country}</a>
                   </td>
                 </tr>
                 {/section}
               </table>

      {* MEMBER PAGE - RIGHT - FINISH *}
      </td>
    </tr>
  </table>