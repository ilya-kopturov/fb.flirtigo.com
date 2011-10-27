{* $Id: searchresults.tpl 354 2008-05-28 03:14:18Z andi $ *}

{if $site_section eq 'public'}
{*<table class="center">
  <tr>
    <td colspan="2" class="menu menu_text">
      <table>
        <tr>
          <td style="width: 45px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}index.php" target="_parent">Home</a></td>
          <td>/</td>
          <td style="width: 75px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}join.php" target="_parent">Free Join</a></td>
          <td>/</td>
          <td style="width: 60px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}join.php" target="_parent">Browse</a></td>
          <td>/</td>
          <td style="width: 60px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_support}" target="_blank">Support</a></td>
          <td>/</td>
          <td style="width: 50px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}join.php" target="_parent">Login</a></td>
        </tr>
      </table>
    </td>
  </tr>
 </table>*}
{else}
	{include file="site/dirtyflirting/login/menu.tpl"}
{/if}

  <table class="center" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="vertical-align: top; text-align: center; padding: 0; width: 744px;">
      {* MEMBER PAGE - RIGHT - *}
        <table cellpadding="0" cellspacing="0" class="list_header">
          <tr>
            <td colspan="{if $smarty.get.tag}6{else}4{/if}" class="redtitle">
            {if $smarty.get.tag}
            	Users tagged with {$smarty.get.tag}
            {else}
            	Search Results
            {/if}
            </td>
          </tr>
          <tr>
            <td class="featuredPopular1" align="left" style="padding-bottom: 10px;">
              {if !$online and !$smarty.get.tag}
                <img src="{$cfg.template.url_template}login/images/dirtyflirting_results_active.gif" style="border: 0px;" />
              {elseif $smarty.get.tag}
				<a href="{$cfg.path.url_site}mem_searchresults.php?tag={$smarty.get.tag|urlencode}&sex=1"><img src="{$cfg.template.url_template}login/images/dirtyflirting_tagfemale_{if $smarty.get.sex == 1}active{else}inactive{/if}.gif" style="border: 0px;"/></a>
              {else}
                <a href="{$cfg.path.url_site}mem_searchresults.php?{$resultslink}"><img src="{$cfg.template.url_template}login/images/dirtyflirting_results_inactive.gif" onmouseover="menu_mouseout('search_results','{$cfg.template.url_template}login/images/dirtyflirting_results_on.gif');" onmouseout="menu_mouseout('search_results','{$cfg.template.url_template}login/images/dirtyflirting_results_inactive.gif');" id="search_results" style="border: 0px;" /></a>
              {/if}
            </td>
            <td class="featuredPopular2" style="padding-bottom: 10px;">
              <img src="{$cfg.template.url_template}login/images/dirtyflirting_graypixel.gif" class="featuredPopular2" />
            </td>
            {if !$smarty.get.tag}
            <td style="height: 23px; width: 80px; padding-bottom: 10px;" align="left">
              {if $online}
                <img src="{$cfg.template.url_template}login/images/dirtyflirting_online_active.gif" style="border: 0px;" />
              {else}
              <a href="{$cfg.path.url_site}mem_searchresults.php?{$onlinelink}"><img src="{$cfg.template.url_template}login/images/dirtyflirting_online_inactive.gif" onmouseover="menu_mouseout('search_online','{$cfg.template.url_template}login/images/dirtyflirting_online_on.gif');" onmouseout="menu_mouseout('search_online','{$cfg.template.url_template}login/images/dirtyflirting_online_inactive.gif');" id="search_online" style="border: 0px;" /></a>
              {/if}
            </td>
            <td style="height:1px;vertical-align: bottom; padding-bottom: 10px;">
              <img src="{$cfg.template.url_template}login/images/dirtyflirting_graypixel.gif" width="596" height="1" />
            </td>
            {else}
            <td style="height: 23px; width: 80px; padding-bottom: 10px;" align="left">
              <a href="{$cfg.path.url_site}mem_searchresults.php?tag={$smarty.get.tag|urlencode}&sex=0"><img src="{$cfg.template.url_template}login/images/dirtyflirting_tagmale_{if $smarty.get.sex == 0}active{else}inactive{/if}.gif" style="border: 0px;" /></a>
            </td>
            <td class="featuredPopular2" style="padding-bottom: 10px;">
              <img src="{$cfg.template.url_template}login/images/dirtyflirting_graypixel.gif" class="featuredPopular2" />
            </td>
            <td style="height: 23px; width: 80px; padding-bottom: 10px;" align="left">
              <a href="{$cfg.path.url_site}mem_searchresults.php?tag={$smarty.get.tag|urlencode}&sex=2"><img src="{$cfg.template.url_template}login/images/dirtyflirting_tagcouples_{if $smarty.get.sex == 2}active{else}inactive{/if}.gif" style="border: 0px;" /></a>
            </td>
            <td style="height:1px;vertical-align: bottom; padding-bottom: 10px;">
              <img src="{$cfg.template.url_template}login/images/dirtyflirting_graypixel.gif" width="515" height="1" />
            </td>
            {/if}
           </tr>
         </table>

      {include file="site/dirtyflirting/login/resultsection.tpl"}

      {* MEMBER PAGE - RIGHT - FINISH *}
      </td>
    </tr>
  </table>