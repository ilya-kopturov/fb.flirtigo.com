<table class="memberstable normaltext" style="width: 750px;" cellpadding="0" cellspacing="0">
  <tr>
    <td style="align: center; padding: 5px;">
    	<table cellpadding="0" cellspacing="0" border="0" style="width: 98%; border: 0px;">
    		<tr>
    			<td style="width: 100%; text-align: left; font: bold 15px;">This Weeks Members Top Rated Site</td>
    		</tr>
    		<tr>
    			<td style="text-align: left; padding: 5px;">
    				<table cellpadding="0" cellspacing="0" style="border: 0px;">
    					<tr>
    						<td style="width: 220px; text-align: left; padding-right: 20px; padding-bottom: 30px; font: normal 12px; vertical-align: top;">
    							<div><a href="{if $smarty.session.sess_accesslevel == 2}javascript: window.open('http://www.flirtigo.com/bonusplug.php?id={$plugins[0].id}','pluginwindow','width=1000,height=600,resizable=no,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes'); void(0);{else}{$cfg.path.url_upgrade}?id={$smarty.session.sess_id}{/if}"><img src="{$cfg.path.url_site}images/mc_{$plugins[0].id}b.jpg" style="border: 0px;"/></a></div>
    							<div style="font-weight: bold;">{$plugins[0].title|upper}</div>
    							<div style="color: red;">{$plugins[0].description|truncate:80:"..."}</div>
    							<div>Rate it: {rating rating=$plugins[0].rating id=$plugins[0].id title=$plugins[0].title}</div>
    							<div>{$plugins[0].votes} votes</div>
    						</td>
    					</tr>
    				</table>
    			</td>
    		</tr>
    		<tr>
    			<td style="width: 100%; text-align: left; font: bold 15px;">More Reality Site to Enjoy</td>
    		</tr>
    		<tr>
    			<td style="text-align: left; padding: 5px;">
    				<table cellpadding="0" cellspacing="0" style="border: 0px;">
    					<tr>
    					    {section name=site loop=$plugins start=1 max=9}
    						<td style="width: 220px; text-align: left; padding-right: 20px; padding-bottom: 30px; font: normal 12px; vertical-align: top;">
    							<div><a href="{if $smarty.session.sess_accesslevel == 2}javascript: window.open('http://www.flirtigo.com/bonusplug.php?id={$plugins[site].id}','pluginwindow','width=1000,height=600,resizable=no,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes'); void(0);{else}{$cfg.path.url_upgrade}?id={$smarty.session.sess_id}{/if}"><img src="{$cfg.path.url_site}images/mc_{$plugins[site].id}s.jpg" style="border: 0px;"/></a></div>
    							<div style="font-weight: bold;">{$plugins[site].title|upper}</div>
    							<div style="color: red;">{$plugins[site].description|truncate:80:"..."}</div>
    							<div>Rate it: {rating rating=$plugins[site].rating id=$plugins[site].id title=$plugins[site].title}</div>
    							<div>{$plugins[site].votes} votes</div>
    						</td>
                            {if $smarty.section.site.iteration % 3 == 0}
                              </tr><tr>
                            {/if}
    						{sectionelse}
    						<td style="text-align: center; font: normal 12px; vertical-align: center;">No results found.</td>
    						{/section}
    					</tr>
    				</table>
    			</td>
    		</tr>
    	</table>
    </td>
  </tr>                 
</table>